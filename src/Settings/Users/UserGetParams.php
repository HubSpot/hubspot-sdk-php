<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Users\UserGetParams\IDProperty;

/**
 * Retrieves a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
 *
 * @see HubspotSDK\Services\Settings\UsersService::get()
 *
 * @phpstan-type UserGetParamsShape = array{
 *   idProperty?: null|IDProperty|value-of<IDProperty>
 * }
 */
final class UserGetParams implements BaseModel
{
    /** @use SdkModel<UserGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`.
     *
     * @var value-of<IDProperty>|null $idProperty
     */
    #[Optional(enum: IDProperty::class)]
    public ?string $idProperty;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IDProperty|value-of<IDProperty>|null $idProperty
     */
    public static function with(IDProperty|string|null $idProperty = null): self
    {
        $self = new self;

        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`.
     *
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
