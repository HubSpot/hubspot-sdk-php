<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing site page.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::createLanguageVariation()
 *
 * @phpstan-type SitePageCreateLanguageVariationParamsShape = array{
 *   id: string, language?: string, primaryLanguage?: string
 * }
 */
final class SitePageCreateLanguageVariationParams implements BaseModel
{
    /** @use SdkModel<SitePageCreateLanguageVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of content to clone.
     */
    #[Api]
    public string $id;

    /**
     * Target language of new variant.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * Language of primary content to clone.
     */
    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new SitePageCreateLanguageVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageCreateLanguageVariationParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageCreateLanguageVariationParams)->withID(...)
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
    public static function with(
        string $id,
        ?string $language = null,
        ?string $primaryLanguage = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $language && $obj->language = $language;
        null !== $primaryLanguage && $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }

    /**
     * ID of content to clone.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Target language of new variant.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    /**
     * Language of primary content to clone.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }
}
