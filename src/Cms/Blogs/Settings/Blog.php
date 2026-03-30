<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Cms\Blogs\Settings\Blog\Language;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BlogShape = array{
 *   id: string,
 *   absoluteURL: string,
 *   allowComments: bool,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   description: string,
 *   htmlTitle: string,
 *   language: Language|value-of<Language>,
 *   listingPageID: string,
 *   name: string,
 *   publicAccessRules: list<mixed>,
 *   publicAccessRulesEnabled: bool,
 *   publicTitle: string,
 *   slug: string,
 *   translatedFromID: string,
 *   updated: \DateTimeInterface,
 * }
 */
final class Blog implements BaseModel
{
    /** @use SdkModel<BlogShape> */
    use SdkModel;

    /**
     * The unique ID of the Blog.
     */
    #[Required]
    public string $id;

    /**
     * Blog's root URL.
     */
    #[Required('absoluteUrl')]
    public string $absoluteURL;

    /**
     * Boolean determining whether or not this blog allows public comments.
     */
    #[Required]
    public bool $allowComments;

    /**
     * The timestamp (ISO8601 format) when this blog was created.
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this Blog was deleted.
     */
    #[Required]
    public \DateTimeInterface $deletedAt;

    /**
     * The Description of this Blog.
     */
    #[Required]
    public string $description;

    /**
     * The html title of this Blog.
     */
    #[Required]
    public string $htmlTitle;

    /**
     * The explicitly defined language of the Blog. If null, the Blog will default to the language of the Domain.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    #[Required('listingPageId')]
    public string $listingPageID;

    /**
     * The internal name of the blog.
     */
    #[Required]
    public string $name;

    /**
     * Rules for require member registration to access private content.
     *
     * @var list<mixed> $publicAccessRules
     */
    #[Required(list: 'mixed')]
    public array $publicAccessRules;

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    #[Required]
    public bool $publicAccessRulesEnabled;

    /**
     * The public title of this Blog.
     */
    #[Required]
    public string $publicTitle;

    /**
     * The path of the this blog. This field is appended to the domain to construct the url of this blog.
     */
    #[Required]
    public string $slug;

    /**
     * ID of the primary Blog this object was translated from.
     */
    #[Required('translatedFromId')]
    public string $translatedFromID;

    /**
     * The timestamp (ISO8601 format) when this blog was updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /**
     * `new Blog()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Blog::with(
     *   id: ...,
     *   absoluteURL: ...,
     *   allowComments: ...,
     *   created: ...,
     *   deletedAt: ...,
     *   description: ...,
     *   htmlTitle: ...,
     *   language: ...,
     *   listingPageID: ...,
     *   name: ...,
     *   publicAccessRules: ...,
     *   publicAccessRulesEnabled: ...,
     *   publicTitle: ...,
     *   slug: ...,
     *   translatedFromID: ...,
     *   updated: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Blog)
     *   ->withID(...)
     *   ->withAbsoluteURL(...)
     *   ->withAllowComments(...)
     *   ->withCreated(...)
     *   ->withDeletedAt(...)
     *   ->withDescription(...)
     *   ->withHTMLTitle(...)
     *   ->withLanguage(...)
     *   ->withListingPageID(...)
     *   ->withName(...)
     *   ->withPublicAccessRules(...)
     *   ->withPublicAccessRulesEnabled(...)
     *   ->withPublicTitle(...)
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
     * @param list<mixed> $publicAccessRules
     */
    public static function with(
        string $id,
        string $absoluteURL,
        bool $allowComments,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $description,
        string $htmlTitle,
        Language|string $language,
        string $listingPageID,
        string $name,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        string $publicTitle,
        string $slug,
        string $translatedFromID,
        \DateTimeInterface $updated,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['absoluteURL'] = $absoluteURL;
        $self['allowComments'] = $allowComments;
        $self['created'] = $created;
        $self['deletedAt'] = $deletedAt;
        $self['description'] = $description;
        $self['htmlTitle'] = $htmlTitle;
        $self['language'] = $language;
        $self['listingPageID'] = $listingPageID;
        $self['name'] = $name;
        $self['publicAccessRules'] = $publicAccessRules;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;
        $self['publicTitle'] = $publicTitle;
        $self['slug'] = $slug;
        $self['translatedFromID'] = $translatedFromID;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * The unique ID of the Blog.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Blog's root URL.
     */
    public function withAbsoluteURL(string $absoluteURL): self
    {
        $self = clone $this;
        $self['absoluteURL'] = $absoluteURL;

        return $self;
    }

    /**
     * Boolean determining whether or not this blog allows public comments.
     */
    public function withAllowComments(bool $allowComments): self
    {
        $self = clone $this;
        $self['allowComments'] = $allowComments;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this blog was created.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * The Description of this Blog.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The html title of this Blog.
     */
    public function withHTMLTitle(string $htmlTitle): self
    {
        $self = clone $this;
        $self['htmlTitle'] = $htmlTitle;

        return $self;
    }

    /**
     * The explicitly defined language of the Blog. If null, the Blog will default to the language of the Domain.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withListingPageID(string $listingPageID): self
    {
        $self = clone $this;
        $self['listingPageID'] = $listingPageID;

        return $self;
    }

    /**
     * The internal name of the blog.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Rules for require member registration to access private content.
     *
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $self = clone $this;
        $self['publicAccessRules'] = $publicAccessRules;

        return $self;
    }

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $self = clone $this;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;

        return $self;
    }

    /**
     * The public title of this Blog.
     */
    public function withPublicTitle(string $publicTitle): self
    {
        $self = clone $this;
        $self['publicTitle'] = $publicTitle;

        return $self;
    }

    /**
     * The path of the this blog. This field is appended to the domain to construct the url of this blog.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * ID of the primary Blog this object was translated from.
     */
    public function withTranslatedFromID(string $translatedFromID): self
    {
        $self = clone $this;
        $self['translatedFromID'] = $translatedFromID;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this blog was updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }
}
