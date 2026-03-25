<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\Language;
use HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::attachToLangGroup()
 *
 * @phpstan-type PostAttachToLangGroupParamsShape = array{
 *   id: string,
 *   language: Language|value-of<Language>,
 *   primaryID: string,
 *   primaryLanguage?: null|PrimaryLanguage|value-of<PrimaryLanguage>,
 * }
 */
final class PostAttachToLangGroupParams implements BaseModel
{
    /** @use SdkModel<PostAttachToLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to add to a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * Designated language of the object to add to a multi-language group.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /**
     * ID of primary language object in multi-language group.
     */
    #[Required('primaryId')]
    public string $primaryID;

    /**
     * Primary language of the multi-language group.
     *
     * @var value-of<PrimaryLanguage>|null $primaryLanguage
     */
    #[Optional(enum: PrimaryLanguage::class)]
    public ?string $primaryLanguage;

    /**
     * `new PostAttachToLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostAttachToLangGroupParams::with(id: ..., language: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostAttachToLangGroupParams)
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
     * @param PrimaryLanguage|value-of<PrimaryLanguage>|null $primaryLanguage
     */
    public static function with(
        string $id,
        Language|string $language,
        string $primaryID,
        PrimaryLanguage|string|null $primaryLanguage = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['language'] = $language;
        $self['primaryID'] = $primaryID;

        null !== $primaryLanguage && $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }

    /**
     * ID of the object to add to a multi-language group.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Designated language of the object to add to a multi-language group.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * ID of primary language object in multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $self = clone $this;
        $self['primaryID'] = $primaryID;

        return $self;
    }

    /**
     * Primary language of the multi-language group.
     *
     * @param PrimaryLanguage|value-of<PrimaryLanguage> $primaryLanguage
     */
    public function withPrimaryLanguage(
        PrimaryLanguage|string $primaryLanguage
    ): self {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }
}
