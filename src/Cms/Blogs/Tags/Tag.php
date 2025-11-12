<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\Tag\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * Model definition for a Tag.
 *
 * @phpstan-type TagShape = array{
 *   id: string,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   language: value-of<Language>,
 *   name: string,
 *   translatedFromId: int,
 *   updated: \DateTimeInterface,
 * }
 */
final class Tag implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TagShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The unique ID of the Blog Tag.
     */
    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was deleted.
     */
    #[Api]
    public \DateTimeInterface $deletedAt;

    /**
     * The explicitly defined ISO 639 language code of the tag.
     *
     * @var value-of<Language> $language
     */
    #[Api(enum: Language::class)]
    public string $language;

    /**
     * The name of the tag.
     */
    #[Api]
    public string $name;

    /**
     * ID of the primary tag this object was translated from.
     */
    #[Api]
    public int $translatedFromId;

    #[Api]
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
     *   translatedFromId: ...,
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
        int $translatedFromId,
        \DateTimeInterface $updated,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->created = $created;
        $obj->deletedAt = $deletedAt;
        $obj['language'] = $language;
        $obj->name = $name;
        $obj->translatedFromId = $translatedFromId;
        $obj->updated = $updated;

        return $obj;
    }

    /**
     * The unique ID of the Blog Tag.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Tag was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    /**
     * The explicitly defined ISO 639 language code of the tag.
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
     * The name of the tag.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * ID of the primary tag this object was translated from.
     */
    public function withTranslatedFromID(int $translatedFromID): self
    {
        $obj = clone $this;
        $obj->translatedFromId = $translatedFromID;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }
}
