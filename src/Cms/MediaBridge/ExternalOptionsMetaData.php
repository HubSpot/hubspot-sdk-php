<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FilteringMetaDataShape from \HubspotSDK\Cms\MediaBridge\FilteringMetaData
 *
 * @phpstan-type ExternalOptionsMetaDataShape = array{
 *   filter?: null|FilteringMetaData|FilteringMetaDataShape,
 *   relatedObjectTypeID?: string|null,
 * }
 */
final class ExternalOptionsMetaData implements BaseModel
{
    /** @use SdkModel<ExternalOptionsMetaDataShape> */
    use SdkModel;

    #[Optional]
    public ?FilteringMetaData $filter;

    #[Optional('relatedObjectTypeId')]
    public ?string $relatedObjectTypeID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilteringMetaDataShape $filter
     */
    public static function with(
        FilteringMetaData|array|null $filter = null,
        ?string $relatedObjectTypeID = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $relatedObjectTypeID && $self['relatedObjectTypeID'] = $relatedObjectTypeID;

        return $self;
    }

    /**
     * @param FilteringMetaDataShape $filter
     */
    public function withFilter(FilteringMetaData|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withRelatedObjectTypeID(string $relatedObjectTypeID): self
    {
        $self = clone $this;
        $self['relatedObjectTypeID'] = $relatedObjectTypeID;

        return $self;
    }
}
