<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\APIAuthKeyWebhookAuthSettings\Location;
use HubspotSDK\Automation\APIAuthKeyWebhookAuthSettings\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_auth_key_webhook_auth_settings = array{
 *   location: value-of<Location>,
 *   name: string,
 *   secretName: string,
 *   type: value-of<Type>,
 * }
 */
final class APIAuthKeyWebhookAuthSettings implements BaseModel
{
    /** @use SdkModel<api_auth_key_webhook_auth_settings> */
    use SdkModel;

    /** @var value-of<Location> $location */
    #[Api(enum: Location::class)]
    public string $location;

    #[Api]
    public string $name;

    #[Api]
    public string $secretName;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIAuthKeyWebhookAuthSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAuthKeyWebhookAuthSettings::with(
     *   location: ..., name: ..., secretName: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIAuthKeyWebhookAuthSettings)
     *   ->withLocation(...)
     *   ->withName(...)
     *   ->withSecretName(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Location|value-of<Location> $location
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Location|string $location,
        string $name,
        string $secretName,
        Type|string $type = 'AUTH_KEY',
    ): self {
        $obj = new self;

        $obj['location'] = $location;
        $obj->name = $name;
        $obj->secretName = $secretName;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param Location|value-of<Location> $location
     */
    public function withLocation(Location|string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSecretName(string $secretName): self
    {
        $obj = clone $this;
        $obj->secretName = $secretName;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
