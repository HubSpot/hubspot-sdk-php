<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a website page by the revision ID.
 *
 * @see HubSpotSDK\Services\Cms\PagesService::getSitePageRevision()
 *
 * @phpstan-type PageGetSitePageRevisionParamsShape = array{objectID: string}
 */
final class PageGetSitePageRevisionParams implements BaseModel
{
    /** @use SdkModel<PageGetSitePageRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PageGetSitePageRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageGetSitePageRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageGetSitePageRevisionParams)->withObjectID(...)
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
    public static function with(string $objectID): self
    {
        $self = new self;

        $self['objectID'] = $objectID;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }
}
