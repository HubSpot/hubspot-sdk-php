<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a Site Page and restores it.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::restoreRevision()
 *
 * @phpstan-type SitePageRestoreRevisionParamsShape = array{objectId: string}
 */
final class SitePageRestoreRevisionParams implements BaseModel
{
    /** @use SdkModel<SitePageRestoreRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectId;

    /**
     * `new SitePageRestoreRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageRestoreRevisionParams::with(objectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageRestoreRevisionParams)->withObjectID(...)
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
