<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set a site page as the primary language of a multi-language group.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::setNewLangPrimary()
 *
 * @phpstan-type SitePageSetNewLangPrimaryParamsShape = array{id: string}
 */
final class SitePageSetNewLangPrimaryParams implements BaseModel
{
    /** @use SdkModel<SitePageSetNewLangPrimaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new SitePageSetNewLangPrimaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageSetNewLangPrimaryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageSetNewLangPrimaryParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    /**
     * ID of object to set as primary in multi-language group.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
