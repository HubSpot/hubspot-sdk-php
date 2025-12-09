<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Cms\Blogs\Settings\Blog\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BlogShape = array{
 *   id: string,
 *   absoluteUrl: string,
 *   allowComments: bool,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   description: string,
 *   htmlTitle: string,
 *   language: value-of<Language>,
 *   name: string,
 *   publicAccessRules: list<mixed>,
 *   publicAccessRulesEnabled: bool,
 *   publicTitle: string,
 *   slug: string,
 *   translatedFromId: string,
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
    #[Api]
    public string $id;

    #[Api]
    public string $absoluteUrl;

    /**
     * Boolean determining whether or not this blog allows public comments.
     */
    #[Api]
    public bool $allowComments;

    #[Api]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this Blog was deleted.
     */
    #[Api]
    public \DateTimeInterface $deletedAt;

    /**
     * The Description of this Blog.
     */
    #[Api]
    public string $description;

    /**
     * The html title of this Blog.
     */
    #[Api]
    public string $htmlTitle;

    /**
     * The explicitly defined language of the Blog. If null, the Blog will default to the language of the Domain.
     *
     * @var value-of<Language> $language
     */
    #[Api(enum: Language::class)]
    public string $language;

    /**
     * The internal name of the blog.
     */
    #[Api]
    public string $name;

    /**
     * Rules for require member registration to access private content.
     *
     * @var list<mixed> $publicAccessRules
     */
    #[Api(list: 'mixed')]
    public array $publicAccessRules;

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    #[Api]
    public bool $publicAccessRulesEnabled;

    /**
     * The public title of this Blog.
     */
    #[Api]
    public string $publicTitle;

    /**
     * The path of the this blog. This field is appended to the domain to construct the url of this blog.
     */
    #[Api]
    public string $slug;

    /**
     * ID of the primary Blog this object was translated from.
     */
    #[Api]
    public string $translatedFromId;

    #[Api]
    public \DateTimeInterface $updated;

    /**
     * `new Blog()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Blog::with(
     *   id: ...,
     *   absoluteUrl: ...,
     *   allowComments: ...,
     *   created: ...,
     *   deletedAt: ...,
     *   description: ...,
     *   htmlTitle: ...,
     *   language: ...,
     *   name: ...,
     *   publicAccessRules: ...,
     *   publicAccessRulesEnabled: ...,
     *   publicTitle: ...,
     *   slug: ...,
     *   translatedFromId: ...,
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
        string $absoluteUrl,
        bool $allowComments,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $description,
        string $htmlTitle,
        Language|string $language,
        string $name,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        string $publicTitle,
        string $slug,
        string $translatedFromId,
        \DateTimeInterface $updated,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['absoluteUrl'] = $absoluteUrl;
        $obj['allowComments'] = $allowComments;
        $obj['created'] = $created;
        $obj['deletedAt'] = $deletedAt;
        $obj['description'] = $description;
        $obj['htmlTitle'] = $htmlTitle;
        $obj['language'] = $language;
        $obj['name'] = $name;
        $obj['publicAccessRules'] = $publicAccessRules;
        $obj['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;
        $obj['publicTitle'] = $publicTitle;
        $obj['slug'] = $slug;
        $obj['translatedFromId'] = $translatedFromId;
        $obj['updated'] = $updated;

        return $obj;
    }

    /**
     * The unique ID of the Blog.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAbsoluteURL(string $absoluteURL): self
    {
        $obj = clone $this;
        $obj['absoluteUrl'] = $absoluteURL;

        return $obj;
    }

    /**
     * Boolean determining whether or not this blog allows public comments.
     */
    public function withAllowComments(bool $allowComments): self
    {
        $obj = clone $this;
        $obj['allowComments'] = $allowComments;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj['created'] = $created;

        return $obj;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj['deletedAt'] = $deletedAt;

        return $obj;
    }

    /**
     * The Description of this Blog.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The html title of this Blog.
     */
    public function withHTMLTitle(string $htmlTitle): self
    {
        $obj = clone $this;
        $obj['htmlTitle'] = $htmlTitle;

        return $obj;
    }

    /**
     * The explicitly defined language of the Blog. If null, the Blog will default to the language of the Domain.
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
     * The internal name of the blog.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Rules for require member registration to access private content.
     *
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $obj = clone $this;
        $obj['publicAccessRules'] = $publicAccessRules;

        return $obj;
    }

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $obj = clone $this;
        $obj['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;

        return $obj;
    }

    /**
     * The public title of this Blog.
     */
    public function withPublicTitle(string $publicTitle): self
    {
        $obj = clone $this;
        $obj['publicTitle'] = $publicTitle;

        return $obj;
    }

    /**
     * The path of the this blog. This field is appended to the domain to construct the url of this blog.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj['slug'] = $slug;

        return $obj;
    }

    /**
     * ID of the primary Blog this object was translated from.
     */
    public function withTranslatedFromID(string $translatedFromID): self
    {
        $obj = clone $this;
        $obj['translatedFromId'] = $translatedFromID;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj['updated'] = $updated;

        return $obj;
    }
}
