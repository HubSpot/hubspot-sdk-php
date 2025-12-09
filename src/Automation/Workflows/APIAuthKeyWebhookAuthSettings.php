<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings\Location;
use HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAuthKeyWebhookAuthSettingsShape = array{
 *   location: value-of<Location>,
 *   name: string,
 *   secretName: string,
 *   type: value-of<Type>,
 * }
 */
final class APIAuthKeyWebhookAuthSettings implements BaseModel
{
    /** @use SdkModel<APIAuthKeyWebhookAuthSettingsShape> */
    use SdkModel;

    /** @var value-of<Location> $location */
    #[Required(enum: Location::class)]
    public string $location;

    #[Required]
    public string $name;

    #[Required]
    public string $secretName;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
        $self = new self;

        $self['location'] = $location;
        $self['name'] = $name;
        $self['secretName'] = $secretName;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Location|value-of<Location> $location
     */
    public function withLocation(Location|string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSecretName(string $secretName): self
    {
        $self = clone $this;
        $self['secretName'] = $secretName;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
