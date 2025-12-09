<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Explicitly set new languages for each site page in a multi-language group.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::updateLanguages()
 *
 * @phpstan-type SitePageUpdateLanguagesParamsShape = array{
 *   languages: array<string,string>, primaryID: string
 * }
 */
final class SitePageUpdateLanguagesParams implements BaseModel
{
    /** @use SdkModel<SitePageUpdateLanguagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @var array<string,string> $languages
     */
    #[Required(map: 'string')]
    public array $languages;

    /**
     * ID of the primary object in the multi-language group.
     */
    #[Required('primaryId')]
    public string $primaryID;

    /**
     * `new SitePageUpdateLanguagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageUpdateLanguagesParams::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageUpdateLanguagesParams)->withLanguages(...)->withPrimaryID(...)
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
     *
     * @param array<string,string> $languages
     */
    public static function with(array $languages, string $primaryID): self
    {
        $self = new self;

        $self['languages'] = $languages;
        $self['primaryID'] = $primaryID;

        return $self;
    }

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @param array<string,string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * ID of the primary object in the multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $self = clone $this;
        $self['primaryID'] = $primaryID;

        return $self;
    }
}
