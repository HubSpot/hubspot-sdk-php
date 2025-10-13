<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings\Location;
use HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings\Type;
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

    /**
     * Where in the request this auth key should be located: "HEADER" or "QUERY_PARAM".
     *
     * @var value-of<Location> $location
     */
    #[Api(enum: Location::class)]
    public string $location;

    /**
     * The name to use for this auth key.
     */
    #[Api]
    public string $name;

    /**
     * The secret to pass through in this auth key.
     */
    #[Api]
    public string $secretName;

    /**
     * The type of webhook auth settings this is, can be: "AUTH_KEY" or "SIGNATURE".
     *
     * @var value-of<Type> $type
     */
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
     * Where in the request this auth key should be located: "HEADER" or "QUERY_PARAM".
     *
     * @param Location|value-of<Location> $location
     */
    public function withLocation(Location|string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }

    /**
     * The name to use for this auth key.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The secret to pass through in this auth key.
     */
    public function withSecretName(string $secretName): self
    {
        $obj = clone $this;
        $obj->secretName = $secretName;

        return $obj;
    }

    /**
     * The type of webhook auth settings this is, can be: "AUTH_KEY" or "SIGNATURE".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
