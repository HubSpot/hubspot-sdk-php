<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Authors;

use HubSpotSDK\Cms\Blogs\Authors\AuthorCreateParams\Language;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new Blog Author.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\AuthorsService::create()
 *
 * @phpstan-type AuthorCreateParamsShape = array{
 *   id: string,
 *   avatar: string,
 *   bio: string,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   displayName: string,
 *   email: string,
 *   facebook: string,
 *   fullName: string,
 *   language: Language|value-of<Language>,
 *   linkedin: string,
 *   name: string,
 *   slug: string,
 *   translatedFromID: int,
 *   twitter: string,
 *   updated: \DateTimeInterface,
 *   website: string,
 * }
 */
final class AuthorCreateParams implements BaseModel
{
    /** @use SdkModel<AuthorCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique ID of the Blog Author.
     */
    #[Required]
    public string $id;

    /**
     * URL to the blog author's avatar, if supplying a custom one.
     */
    #[Required]
    public string $avatar;

    /**
     * A short biography of the blog author.
     */
    #[Required]
    public string $bio;

    /**
     * The timestamp (ISO8601 format) when this Blog Author was created.
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this Blog Author was deleted.
     */
    #[Required]
    public \DateTimeInterface $deletedAt;

    /**
     * The full name of the Blog Author to be displayed.
     */
    #[Required]
    public string $displayName;

    /**
     * Email address of the Blog Author.
     */
    #[Required]
    public string $email;

    /**
     * URL to the Blog Author's Facebook page.
     */
    #[Required]
    public string $facebook;

    /**
     * The full, unabbreviated name of the blog author, typically their first and last name combined.
     */
    #[Required]
    public string $fullName;

    /**
     * The explicitly defined ISO 639 language code of the blog author.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /**
     * URL to the blog author's LinkedIn page.
     */
    #[Required]
    public string $linkedin;

    /**
     * The name field for the blog author. (This appears to be a shorter or alternative name field compared to fullName.).
     */
    #[Required]
    public string $name;

    /**
     * A URL-friendly identifier for the blog author that can be used to reference the author in URLs. Typically generated from the author's name and contains lowercase letters, hyphens, and underscores.
     */
    #[Required]
    public string $slug;

    /**
     * ID of the primary blog author this object was translated from.
     */
    #[Required('translatedFromId')]
    public int $translatedFromID;

    /**
     * URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     */
    #[Required]
    public string $twitter;

    /**
     * The timestamp (ISO8601 format) when this Blog Author was updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /**
     * URL to the website of the Blog Author.
     */
    #[Required]
    public string $website;

    /**
     * `new AuthorCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorCreateParams::with(
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
     * (new AuthorCreateParams)
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
        $self = new self;

        $self['id'] = $id;
        $self['avatar'] = $avatar;
        $self['bio'] = $bio;
        $self['created'] = $created;
        $self['deletedAt'] = $deletedAt;
        $self['displayName'] = $displayName;
        $self['email'] = $email;
        $self['facebook'] = $facebook;
        $self['fullName'] = $fullName;
        $self['language'] = $language;
        $self['linkedin'] = $linkedin;
        $self['name'] = $name;
        $self['slug'] = $slug;
        $self['translatedFromID'] = $translatedFromID;
        $self['twitter'] = $twitter;
        $self['updated'] = $updated;
        $self['website'] = $website;

        return $self;
    }

    /**
     * The unique ID of the Blog Author.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * URL to the blog author's avatar, if supplying a custom one.
     */
    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * A short biography of the blog author.
     */
    public function withBio(string $bio): self
    {
        $self = clone $this;
        $self['bio'] = $bio;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Author was created.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Author was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * The full name of the Blog Author to be displayed.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Email address of the Blog Author.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * URL to the Blog Author's Facebook page.
     */
    public function withFacebook(string $facebook): self
    {
        $self = clone $this;
        $self['facebook'] = $facebook;

        return $self;
    }

    /**
     * The full, unabbreviated name of the blog author, typically their first and last name combined.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * The explicitly defined ISO 639 language code of the blog author.
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
     * URL to the blog author's LinkedIn page.
     */
    public function withLinkedin(string $linkedin): self
    {
        $self = clone $this;
        $self['linkedin'] = $linkedin;

        return $self;
    }

    /**
     * The name field for the blog author. (This appears to be a shorter or alternative name field compared to fullName.).
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A URL-friendly identifier for the blog author that can be used to reference the author in URLs. Typically generated from the author's name and contains lowercase letters, hyphens, and underscores.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * ID of the primary blog author this object was translated from.
     */
    public function withTranslatedFromID(int $translatedFromID): self
    {
        $self = clone $this;
        $self['translatedFromID'] = $translatedFromID;

        return $self;
    }

    /**
     * URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     */
    public function withTwitter(string $twitter): self
    {
        $self = clone $this;
        $self['twitter'] = $twitter;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Author was updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * URL to the website of the Blog Author.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
