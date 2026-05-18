<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages\Revisions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Specify a previous version of a landing page to set as the page draft.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPages\RevisionsService::restoreLandingPageRevisionToDraft()
 *
 * @phpstan-type RevisionRestoreLandingPageRevisionToDraftParamsShape = array{
 *   objectID: string
 * }
 */
final class RevisionRestoreLandingPageRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<RevisionRestoreLandingPageRevisionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new RevisionRestoreLandingPageRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionRestoreLandingPageRevisionToDraftParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionRestoreLandingPageRevisionToDraftParams)->withObjectID(...)
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
