<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Sparse updates a single Blog Tag object identified by the id in the path.
 * All the column values need not be specified. Only the that need to be modified can be specified.
 *
 * @see HubspotSDK\Services\Cms\Blogs\TagsService::update()
 *
 * @phpstan-type TagUpdateParamsShape = array{
 *   id: string,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   language: Language|value-of<Language>,
 *   name: string,
 *   translatedFromID: int,
 *   updated: \DateTimeInterface,
 *   archived?: bool,
 * }
 */
final class TagUpdateParams implements BaseModel
{
    /** @use SdkModel<TagUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique ID of the Blog Tag.
     */
    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was deleted.
     */
    #[Required]
    public \DateTimeInterface $deletedAt;

    /**
     * The explicitly defined ISO 639 language code of the tag.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /**
     * The name of the tag.
     */
    #[Required]
    public string $name;

    /**
     * ID of the primary tag this object was translated from.
     */
    #[Required('translatedFromId')]
    public int $translatedFromID;

    #[Required]
    public \DateTimeInterface $updated;

    /**
     * Specifies whether to update deleted Blog Tags. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new TagUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagUpdateParams::with(
     *   id: ...,
     *   created: ...,
     *   deletedAt: ...,
     *   language: ...,
     *   name: ...,
     *   translatedFromID: ...,
     *   updated: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagUpdateParams)
     *   ->withID(...)
     *   ->withCreated(...)
     *   ->withDeletedAt(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withTranslatedFromID(...)
     *   ->withUpdated(...)
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
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        Language|string $language,
        string $name,
        int $translatedFromID,
        \DateTimeInterface $updated,
        ?bool $archived = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['created'] = $created;
        $self['deletedAt'] = $deletedAt;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['translatedFromID'] = $translatedFromID;
        $self['updated'] = $updated;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    /**
     * The unique ID of the Blog Tag.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * The explicitly defined ISO 639 language code of the tag.
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
     * The name of the tag.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * ID of the primary tag this object was translated from.
     */
    public function withTranslatedFromID(int $translatedFromID): self
    {
        $self = clone $this;
        $self['translatedFromID'] = $translatedFromID;

        return $self;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * Specifies whether to update deleted Blog Tags. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
