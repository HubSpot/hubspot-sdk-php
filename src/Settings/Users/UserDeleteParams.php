<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Users\UserDeleteParams\IDProperty;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UserDeleteParams); // set properties as needed
 * $client->settings.users->delete(...$params->toArray());
 * ```
 * Removes a user.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->settings.users->delete(...$params->toArray());`
 *
 * @see HubspotSDK\Settings\Users->delete
 *
 * @phpstan-type user_delete_params = array{
 *   idProperty?: IDProperty|value-of<IDProperty>
 * }
 */
final class UserDeleteParams implements BaseModel
{
    /** @use SdkModel<user_delete_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<IDProperty>|null $idProperty */
    #[Api(enum: IDProperty::class, optional: true)]
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
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public static function with(IDProperty|string|null $idProperty = null): self
    {
        $obj = new self;

        null !== $idProperty && $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }
}
