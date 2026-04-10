<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FilteringMetaDataShape from \HubSpotSDK\Cms\MediaBridge\FilteringMetaData
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
     * @param FilteringMetaData|FilteringMetaDataShape|null $filter
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
     * @param FilteringMetaData|FilteringMetaDataShape $filter
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
