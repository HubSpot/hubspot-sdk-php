<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\SitePages\Revisions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a website page and sets it as the new draft version of the page.
 *
 * @see HubSpotSDK\Services\Cms\Pages\SitePages\RevisionsService::restoreSitePageRevisionToDraft()
 *
 * @phpstan-type RevisionRestoreSitePageRevisionToDraftParamsShape = array{
 *   objectID: string
 * }
 */
final class RevisionRestoreSitePageRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<RevisionRestoreSitePageRevisionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new RevisionRestoreSitePageRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionRestoreSitePageRevisionToDraftParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionRestoreSitePageRevisionToDraftParams)->withObjectID(...)
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
