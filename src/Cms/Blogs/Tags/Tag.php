<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Tags;

use HubSpotSDK\Cms\Blogs\Tags\Tag\Language;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TagShape = array{
 *   id: string,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   language: Language|value-of<Language>,
 *   name: string,
 *   slug: string,
 *   translatedFromID: int,
 *   updated: \DateTimeInterface,
 * }
 */
final class Tag implements BaseModel
{
    /** @use SdkModel<TagShape> */
    use SdkModel;

    /**
     * The unique ID of the Blog Tag.
     */
    #[Required]
    public string $id;

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was created.
     */
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

    #[Required]
    public string $slug;

    /**
     * ID of the primary tag this object was translated from.
     */
    #[Required('translatedFromId')]
    public int $translatedFromID;

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /**
     * `new Tag()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Tag::with(
     *   id: ...,
     *   created: ...,
     *   deletedAt: ...,
     *   language: ...,
     *   name: ...,
     *   slug: ...,
     *   translatedFromID: ...,
     *   updated: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Tag)
     *   ->withID(...)
     *   ->withCreated(...)
     *   ->withDeletedAt(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withSlug(...)
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
        string $slug,
        int $translatedFromID,
        \DateTimeInterface $updated,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['created'] = $created;
        $self['deletedAt'] = $deletedAt;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['slug'] = $slug;
        $self['translatedFromID'] = $translatedFromID;
        $self['updated'] = $updated;

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

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was created.
     */
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

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

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

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }
}
