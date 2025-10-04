<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TagCreateParams); // set properties as needed
 * $client->cms.blogs.tags->create(...$params->toArray());
 * ```
 * Create a new Blog Tag.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.tags->create(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Tags->create
 *
 * @phpstan-type tag_create_params = array{
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
    /** @use SdkModel<tag_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $created;

    #[Api]
    public \DateTimeInterface $deletedAt;

    /** @var value-of<Language> $language */
    #[Api(enum: Language::class)]
    public string $language;

    #[Api]
    public string $name;

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

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

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
