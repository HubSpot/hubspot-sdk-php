<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Specify a previous version of a landing page to set as the page draft.
 *
 * @see HubSpotSDK\Services\Cms\PagesService::restoreLandingPageRevisionToDraft()
 *
 * @phpstan-type PageRestoreLandingPageRevisionToDraftParamsShape = array{
 *   objectID: string
 * }
 */
final class PageRestoreLandingPageRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<PageRestoreLandingPageRevisionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PageRestoreLandingPageRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageRestoreLandingPageRevisionToDraftParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageRestoreLandingPageRevisionToDraftParams)->withObjectID(...)
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
