<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves a previous version of a Site Page.
 *
 * @see HubspotSDK\Cms\Pages\SitePages->getRevision
 *
 * @phpstan-type site_page_get_revision_params = array{objectID: string}
 */
final class SitePageGetRevisionParams implements BaseModel
{
    /** @use SdkModel<site_page_get_revision_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectID;

    /**
     * `new SitePageGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageGetRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageGetRevisionParams)->withObjectID(...)
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
        $obj = new self;

        $obj->objectID = $objectID;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }
}
