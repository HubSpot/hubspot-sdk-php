<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SiteSearch;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Return all indexed data for an asset (e.g., page, blog post, HubDB table), specified by ID. This is useful when debugging why a particular asset is not returned from a custom search.
 *
 * @see HubSpotSDK\Services\Cms\SiteSearchService::getIndexedData()
 *
 * @phpstan-type SiteSearchGetIndexedDataParamsShape = array{type?: string|null}
 */
final class SiteSearchGetIndexedDataParams implements BaseModel
{
    /** @use SdkModel<SiteSearchGetIndexedDataParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
