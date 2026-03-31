<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Restores a website page to a previous version, specified by page ID and version ID.
 *
 * @see HubspotSDK\Services\Cms\PagesService::restoreSitePageRevision()
 *
 * @phpstan-type PageRestoreSitePageRevisionParamsShape = array{objectID: string}
 */
final class PageRestoreSitePageRevisionParams implements BaseModel
{
    /** @use SdkModel<PageRestoreSitePageRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PageRestoreSitePageRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageRestoreSitePageRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageRestoreSitePageRevisionParams)->withObjectID(...)
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
