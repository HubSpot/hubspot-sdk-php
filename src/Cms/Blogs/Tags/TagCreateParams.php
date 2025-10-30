<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new Blog Tag.
 *
 * @see HubspotSDK\Cms\Blogs\Tags->create
 *
 * @phpstan-type TagCreateParamsShape = array{
 *   id: string,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   language: Language|value-of<Language>,
 *   name: string,
 *   translatedFromID: int,
 *   updated: \DateTimeInterface,
 * }
 */
final class TagCreateParams implements BaseModel
{
    /** @use SdkModel<TagCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
    #[Api('translatedFromId')]
    public int $translatedFromID;

    #[Api]
    public \DateTimeInterface $updated;

    /**
     * `new TagCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagCreateParams::with(
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
     * (new TagCreateParams)
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
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->created = $created;
        $obj->deletedAt = $deletedAt;
        $obj['language'] = $language;
        $obj->name = $name;
        $obj->translatedFromID = $translatedFromID;
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
        $obj->translatedFromID = $translatedFromID;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }
}
