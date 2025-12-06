<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a Site Page, sets it as the new draft version of the Site Page.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::restoreRevisionToDraft()
 *
 * @phpstan-type SitePageRestoreRevisionToDraftParamsShape = array{
 *   objectId: string
 * }
 */
final class SitePageRestoreRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<SitePageRestoreRevisionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectId;

    /**
     * `new SitePageRestoreRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageRestoreRevisionToDraftParams::with(objectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageRestoreRevisionToDraftParams)->withObjectID(...)
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
    public static function with(string $objectId): self
    {
        $obj = new self;

        $obj['objectId'] = $objectId;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }
}
