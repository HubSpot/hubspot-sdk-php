<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for an existing property by name.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::get()
 *
 * @phpstan-type PropertyGetParamsShape = array{
 *   appID: int, objectType: string, archived?: bool, properties?: string
 * }
 */
final class PropertyGetParams implements BaseModel
{
    /** @use SdkModel<PropertyGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $objectType;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Limit the response to only include the specified properties.
     */
    #[Optional]
    public ?string $properties;

    /**
     * `new PropertyGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGetParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGetParams)->withAppID(...)->withObjectType(...)
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
        string $objectType,
        ?bool $archived = null,
        ?string $properties = null,
    ): self {
        $obj = new self;

        $obj['appID'] = $appID;
        $obj['objectType'] = $objectType;

        null !== $archived && $obj['archived'] = $archived;
        null !== $properties && $obj['properties'] = $properties;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Limit the response to only include the specified properties.
     */
    public function withProperties(string $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
