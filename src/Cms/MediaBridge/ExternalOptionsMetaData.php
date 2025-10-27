<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type external_options_meta_data = array{
 *   filter?: FilteringMetaData, relatedObjectTypeID?: string
 * }
 */
final class ExternalOptionsMetaData implements BaseModel
{
    /** @use SdkModel<external_options_meta_data> */
    use SdkModel;

    #[Api(optional: true)]
    public ?FilteringMetaData $filter;

    #[Api('relatedObjectTypeId', optional: true)]
    public ?string $relatedObjectTypeID;

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
        ?FilteringMetaData $filter = null,
        ?string $relatedObjectTypeID = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $relatedObjectTypeID && $obj->relatedObjectTypeID = $relatedObjectTypeID;

        return $obj;
    }

    public function withFilter(FilteringMetaData $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    public function withRelatedObjectTypeID(string $relatedObjectTypeID): self
    {
        $obj = clone $this;
        $obj->relatedObjectTypeID = $relatedObjectTypeID;

        return $obj;
    }
}
