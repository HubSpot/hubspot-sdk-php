<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Restores a website page to a previous version, specified by page ID and version ID.
 *
 * @see HubSpotSDK\Services\Cms\PagesService::restoreSitePageRevision()
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
