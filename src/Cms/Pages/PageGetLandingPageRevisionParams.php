<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a landing page, specified by page ID and revision ID.
 *
 * @see HubSpotSDK\Services\Cms\PagesService::getLandingPageRevision()
 *
 * @phpstan-type PageGetLandingPageRevisionParamsShape = array{objectID: string}
 */
final class PageGetLandingPageRevisionParams implements BaseModel
{
    /** @use SdkModel<PageGetLandingPageRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PageGetLandingPageRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageGetLandingPageRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageGetLandingPageRevisionParams)->withObjectID(...)
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
