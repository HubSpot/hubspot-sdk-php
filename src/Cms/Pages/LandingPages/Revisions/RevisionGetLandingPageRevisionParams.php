<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages\Revisions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a landing page, specified by page ID and revision ID.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPages\RevisionsService::getLandingPageRevision()
 *
 * @phpstan-type RevisionGetLandingPageRevisionParamsShape = array{
 *   objectID: string
 * }
 */
final class RevisionGetLandingPageRevisionParams implements BaseModel
{
    /** @use SdkModel<RevisionGetLandingPageRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new RevisionGetLandingPageRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionGetLandingPageRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionGetLandingPageRevisionParams)->withObjectID(...)
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
