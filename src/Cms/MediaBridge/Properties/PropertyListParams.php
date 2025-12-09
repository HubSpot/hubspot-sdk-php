<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing properties defined for a media object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::list()
 *
 * @phpstan-type PropertyListParamsShape = array{
 *   appID: int, archived?: bool, properties?: string
 * }
 */
final class PropertyListParams implements BaseModel
{
    /** @use SdkModel<PropertyListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Filter the response to the specified properties.
     */
    #[Optional]
    public ?string $properties;

    /**
     * `new PropertyListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyListParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyListParams)->withAppID(...)
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
     */
    public static function with(
        int $appID,
        ?bool $archived = null,
        ?string $properties = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $archived && $self['archived'] = $archived;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Filter the response to the specified properties.
     */
    public function withProperties(string $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
