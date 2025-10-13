<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs;

use HubspotSDK\Cms\Blogs\AttachToLangPrimaryRequestVNext\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for attaching objects to multi-language groups.
 *
 * @phpstan-type attach_to_lang_primary_request_v_next = array{
 *   id: string,
 *   language: value-of<Language>,
 *   primaryID: string,
 *   primaryLanguage?: string,
 * }
 */
final class AttachToLangPrimaryRequestVNext implements BaseModel
{
    /** @use SdkModel<attach_to_lang_primary_request_v_next> */
    use SdkModel;

    /**
     * ID of the object to add to a multi-language group.
     */
    #[Api]
    public string $id;

    /**
     * Designated language of the object to add to a multi-language group.
     *
     * @var value-of<Language> $language
     */
    #[Api(enum: Language::class)]
    public string $language;

    /**
     * ID of primary language object in multi-language group.
     */
    #[Api('primaryId')]
    public string $primaryID;

    /**
     * Primary language of the multi-language group.
     */
    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new AttachToLangPrimaryRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttachToLangPrimaryRequestVNext::with(id: ..., language: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttachToLangPrimaryRequestVNext)
     *   ->withID(...)
     *   ->withLanguage(...)
     *   ->withPrimaryID(...)
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
     * @param Language|value-of<Language> $language
     */
    public static function with(
        string $id,
        Language|string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['language'] = $language;
        $obj->primaryID = $primaryID;

        null !== $primaryLanguage && $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }

    /**
     * ID of the object to add to a multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Designated language of the object to add to a multi-language group.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * ID of primary language object in multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj->primaryID = $primaryID;

        return $obj;
    }

    /**
     * Primary language of the multi-language group.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }
}
