<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalOptionsMetaDataShape = array{
 *   filter?: FilteringMetaData|null, relatedObjectTypeId?: string|null
 * }
 */
final class ExternalOptionsMetaData implements BaseModel
{
    /** @use SdkModel<ExternalOptionsMetaDataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?FilteringMetaData $filter;

    #[Api(optional: true)]
    public ?string $relatedObjectTypeId;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilteringMetaData|array{
     *   includeUnconfirmedUsers: bool, pipelineIds: list<string>
     * } $filter
     */
    public static function with(
        FilteringMetaData|array|null $filter = null,
        ?string $relatedObjectTypeId = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $relatedObjectTypeId && $obj['relatedObjectTypeId'] = $relatedObjectTypeId;

        return $obj;
    }

    /**
     * @param FilteringMetaData|array{
     *   includeUnconfirmedUsers: bool, pipelineIds: list<string>
     * } $filter
     */
    public function withFilter(FilteringMetaData|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    public function withRelatedObjectTypeID(string $relatedObjectTypeID): self
    {
        $obj = clone $this;
        $obj['relatedObjectTypeId'] = $relatedObjectTypeID;

        return $obj;
    }
}
