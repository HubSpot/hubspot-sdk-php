<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Restores a previous version of a landing page, specified by page ID and revision ID.
 *
 * @see HubSpotSDK\Services\Cms\PagesService::restoreLandingPageRevision()
 *
 * @phpstan-type PageRestoreLandingPageRevisionParamsShape = array{
 *   objectID: string
 * }
 */
final class PageRestoreLandingPageRevisionParams implements BaseModel
{
    /** @use SdkModel<PageRestoreLandingPageRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PageRestoreLandingPageRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageRestoreLandingPageRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageRestoreLandingPageRevisionParams)->withObjectID(...)
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
