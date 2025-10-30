<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for creating new language variant content.
 *
 * @phpstan-type ContentLanguageCloneRequestVNextShape = array{
 *   id: string, language?: string, primaryLanguage?: string
 * }
 */
final class ContentLanguageCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<ContentLanguageCloneRequestVNextShape> */
    use SdkModel;

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
     * `new ContentLanguageCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentLanguageCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentLanguageCloneRequestVNext)->withID(...)
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
