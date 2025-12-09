<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Attach a Blog Tag to a multi-language group.
 *
 * @see HubspotSDK\Services\Cms\Blogs\TagsService::attachToLangGroup()
 *
 * @phpstan-type TagAttachToLangGroupParamsShape = array{
 *   id: string, language: string, primaryID: string, primaryLanguage?: string
 * }
 */
final class TagAttachToLangGroupParams implements BaseModel
{
    /** @use SdkModel<TagAttachToLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to add to a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * Designated language of the object to add to a multi-language group.
     */
    #[Required]
    public string $language;

    /**
     * ID of primary language object in multi-language group.
     */
    #[Required('primaryId')]
    public string $primaryID;

    /**
     * Primary language of the multi-language group.
     */
    #[Optional]
    public ?string $primaryLanguage;

    /**
     * `new TagAttachToLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagAttachToLangGroupParams::with(id: ..., language: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagAttachToLangGroupParams)
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
     */
    public static function with(
        string $id,
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
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
     */
    public function withLanguage(string $language): self
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
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }
}
