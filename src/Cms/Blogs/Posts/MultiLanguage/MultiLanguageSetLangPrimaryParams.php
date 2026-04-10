<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Posts\MultiLanguage;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body).
 *
 * @see HubSpotSDK\Services\Cms\Blogs\Posts\MultiLanguageService::setLangPrimary()
 *
 * @phpstan-type MultiLanguageSetLangPrimaryParamsShape = array{id: string}
 */
final class MultiLanguageSetLangPrimaryParams implements BaseModel
{
    /** @use SdkModel<MultiLanguageSetLangPrimaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new MultiLanguageSetLangPrimaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiLanguageSetLangPrimaryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiLanguageSetLangPrimaryParams)->withID(...)
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
