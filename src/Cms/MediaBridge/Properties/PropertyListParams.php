<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing properties defined for a media object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::list()
 *
 * @phpstan-type PropertyListParamsShape = array{
 *   appId: int, archived?: bool, properties?: string
 * }
 */
final class PropertyListParams implements BaseModel
{
    /** @use SdkModel<PropertyListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Filter the response to the specified properties.
     */
    #[Api(optional: true)]
    public ?string $properties;

    /**
     * `new PropertyListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyListParams::with(appId: ...)
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
        int $appId,
        ?bool $archived = null,
        ?string $properties = null
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;

        null !== $archived && $obj['archived'] = $archived;
        null !== $properties && $obj['properties'] = $properties;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

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
     * Filter the response to the specified properties.
     */
    public function withProperties(string $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
