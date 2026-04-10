<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Users;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Settings\Users\UserGetParams\IDProperty;

/**
 * Retrieves a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
 *
 * @see HubSpotSDK\Services\Settings\UsersService::get()
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

    /** @var value-of<IDProperty>|null $idProperty */
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
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
