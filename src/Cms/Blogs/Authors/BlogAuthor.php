<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Cms\Blogs\Authors\BlogAuthor\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * Model definition for a Blog Author.
 *
 * @phpstan-type BlogAuthorShape = array{
 *   id: string,
 *   avatar: string,
 *   bio: string,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   displayName: string,
 *   email: string,
 *   facebook: string,
 *   fullName: string,
 *   language: value-of<Language>,
 *   linkedin: string,
 *   name: string,
 *   slug: string,
 *   translatedFromID: int,
 *   twitter: string,
 *   updated: \DateTimeInterface,
 *   website: string,
 * }
 */
final class BlogAuthor implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BlogAuthorShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The unique ID of the Blog Author.
     */
    #[Api]
    public string $id;

    /**
     * URL to the blog author's avatar, if supplying a custom one.
     */
    #[Api]
    public string $avatar;

    /**
     * A short biography of the blog author.
     */
    #[Api]
    public string $bio;

    #[Api]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this Blog Author was deleted.
     */
    #[Api]
    public \DateTimeInterface $deletedAt;

    /**
     * The full name of the Blog Author to be displayed.
     */
    #[Api]
    public string $displayName;

    /**
     * Email address of the Blog Author.
     */
    #[Api]
    public string $email;

    /**
     * URL to the Blog Author's Facebook page.
     */
    #[Api]
    public string $facebook;

    #[Api]
    public string $fullName;

    /**
     * The explicitly defined ISO 639 language code of the blog author.
     *
     * @var value-of<Language> $language
     */
    #[Api(enum: Language::class)]
    public string $language;

    /**
     * URL to the blog author's LinkedIn page.
     */
    #[Api]
    public string $linkedin;

    #[Api]
    public string $name;

    #[Api]
    public string $slug;

    /**
     * ID of the primary blog author this object was translated from.
     */
    #[Api('translatedFromId')]
    public int $translatedFromID;

    /**
     * URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     */
    #[Api]
    public string $twitter;

    #[Api]
    public \DateTimeInterface $updated;

    /**
     * URL to the website of the Blog Author.
     */
    #[Api]
    public string $website;

    /**
     * `new BlogAuthor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogAuthor::with(
     *   id: ...,
     *   avatar: ...,
     *   bio: ...,
     *   created: ...,
     *   deletedAt: ...,
     *   displayName: ...,
     *   email: ...,
     *   facebook: ...,
     *   fullName: ...,
     *   language: ...,
     *   linkedin: ...,
     *   name: ...,
     *   slug: ...,
     *   translatedFromID: ...,
     *   twitter: ...,
     *   updated: ...,
     *   website: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogAuthor)
     *   ->withID(...)
     *   ->withAvatar(...)
     *   ->withBio(...)
     *   ->withCreated(...)
     *   ->withDeletedAt(...)
     *   ->withDisplayName(...)
     *   ->withEmail(...)
     *   ->withFacebook(...)
     *   ->withFullName(...)
     *   ->withLanguage(...)
     *   ->withLinkedin(...)
     *   ->withName(...)
     *   ->withSlug(...)
     *   ->withTranslatedFromID(...)
     *   ->withTwitter(...)
     *   ->withUpdated(...)
     *   ->withWebsite(...)
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
        string $avatar,
        string $bio,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $displayName,
        string $email,
        string $facebook,
        string $fullName,
        Language|string $language,
        string $linkedin,
        string $name,
        string $slug,
        int $translatedFromID,
        string $twitter,
        \DateTimeInterface $updated,
        string $website,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->avatar = $avatar;
        $obj->bio = $bio;
        $obj->created = $created;
        $obj->deletedAt = $deletedAt;
        $obj->displayName = $displayName;
        $obj->email = $email;
        $obj->facebook = $facebook;
        $obj->fullName = $fullName;
        $obj['language'] = $language;
        $obj->linkedin = $linkedin;
        $obj->name = $name;
        $obj->slug = $slug;
        $obj->translatedFromID = $translatedFromID;
        $obj->twitter = $twitter;
        $obj->updated = $updated;
        $obj->website = $website;

        return $obj;
    }

    /**
     * The unique ID of the Blog Author.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * URL to the blog author's avatar, if supplying a custom one.
     */
    public function withAvatar(string $avatar): self
    {
        $obj = clone $this;
        $obj->avatar = $avatar;

        return $obj;
    }

    /**
     * A short biography of the blog author.
     */
    public function withBio(string $bio): self
    {
        $obj = clone $this;
        $obj->bio = $bio;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Author was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    /**
     * The full name of the Blog Author to be displayed.
     */
    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }

    /**
     * Email address of the Blog Author.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * URL to the Blog Author's Facebook page.
     */
    public function withFacebook(string $facebook): self
    {
        $obj = clone $this;
        $obj->facebook = $facebook;

        return $obj;
    }

    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj->fullName = $fullName;

        return $obj;
    }

    /**
     * The explicitly defined ISO 639 language code of the blog author.
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
     * URL to the blog author's LinkedIn page.
     */
    public function withLinkedin(string $linkedin): self
    {
        $obj = clone $this;
        $obj->linkedin = $linkedin;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    /**
     * ID of the primary blog author this object was translated from.
     */
    public function withTranslatedFromID(int $translatedFromID): self
    {
        $obj = clone $this;
        $obj->translatedFromID = $translatedFromID;

        return $obj;
    }

    /**
     * URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     */
    public function withTwitter(string $twitter): self
    {
        $obj = clone $this;
        $obj->twitter = $twitter;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }

    /**
     * URL to the website of the Blog Author.
     */
    public function withWebsite(string $website): self
    {
        $obj = clone $this;
        $obj->website = $website;

        return $obj;
    }
}
