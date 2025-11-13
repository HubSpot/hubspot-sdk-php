<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read all existing properties for the specified object type and HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\PropertiesService::list()
 *
 * @phpstan-type PropertyListParamsShape = array{
 *   archived?: bool, properties?: string
 * }
 */
final class PropertyListParams implements BaseModel
{
    /** @use SdkModel<PropertyListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $properties;

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
        ?bool $archived = null,
        ?string $properties = null
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $properties && $obj->properties = $properties;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withProperties(string $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
