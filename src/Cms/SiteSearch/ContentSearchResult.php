<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SiteSearch;

use HubSpotSDK\Cms\SiteSearch\ContentSearchResult\Language;
use HubSpotSDK\Cms\SiteSearch\ContentSearchResult\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentSearchResultShape = array{
 *   id: int,
 *   domain: string,
 *   score: float,
 *   type: Type|value-of<Type>,
 *   url: string,
 *   authorFullName?: string|null,
 *   category?: string|null,
 *   combinedID?: string|null,
 *   contentType?: string|null,
 *   description?: string|null,
 *   featuredImageURL?: string|null,
 *   inBeta?: bool|null,
 *   isPrivate?: bool|null,
 *   language?: null|Language|value-of<Language>,
 *   publishedDate?: int|null,
 *   rowID?: int|null,
 *   subcategory?: string|null,
 *   tableID?: int|null,
 *   tags?: list<string>|null,
 *   title?: string|null,
 * }
 */
final class ContentSearchResult implements BaseModel
{
    /** @use SdkModel<ContentSearchResultShape> */
    use SdkModel;

    /**
     * The ID of the content.
     */
    #[Required]
    public int $id;

    /**
     * The domain the document is hosted on.
     */
    #[Required]
    public string $domain;

    /**
     * The matching score of the document.
     */
    #[Required]
    public float $score;

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The url of the document.
     */
    #[Required]
    public string $url;

    /**
     * Name of the author.
     */
    #[Optional]
    public ?string $authorFullName;

    /**
     * The error category.
     */
    #[Optional]
    public ?string $category;

    /**
     * The ID of the document in HubSpot.
     */
    #[Optional('combinedId')]
    public ?string $combinedID;

    #[Optional]
    public ?string $contentType;

    /**
     * The result's description. The content will be determined by the value of `length` in the request.
     */
    #[Optional]
    public ?string $description;

    /**
     * URL of the featured image.
     */
    #[Optional('featuredImageUrl')]
    public ?string $featuredImageURL;

    #[Optional]
    public ?bool $inBeta;

    #[Optional]
    public ?bool $isPrivate;

    /**
     * The document's language.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The date the content was published.
     */
    #[Optional]
    public ?int $publishedDate;

    /**
     * If a dynamic page, the row ID in the HubDB table.
     */
    #[Optional('rowId')]
    public ?int $rowID;

    /**
     * For knowledge articles, the subcategory of the article.
     */
    #[Optional]
    public ?string $subcategory;

    /**
     * If a dynamic page, the ID of the HubDB table.
     */
    #[Optional('tableId')]
    public ?int $tableID;

    /**
     * If a blog post, the tags associated with it.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * The title of the returned document.
     */
    #[Optional]
    public ?string $title;

    /**
     * `new ContentSearchResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentSearchResult::with(id: ..., domain: ..., score: ..., type: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentSearchResult)
     *   ->withID(...)
     *   ->withDomain(...)
     *   ->withScore(...)
     *   ->withType(...)
     *   ->withURL(...)
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
     * @param Type|value-of<Type> $type
     * @param Language|value-of<Language>|null $language
     * @param list<string>|null $tags
     */
    public static function with(
        int $id,
        string $domain,
        float $score,
        Type|string $type,
        string $url,
        ?string $authorFullName = null,
        ?string $category = null,
        ?string $combinedID = null,
        ?string $contentType = null,
        ?string $description = null,
        ?string $featuredImageURL = null,
        ?bool $inBeta = null,
        ?bool $isPrivate = null,
        Language|string|null $language = null,
        ?int $publishedDate = null,
        ?int $rowID = null,
        ?string $subcategory = null,
        ?int $tableID = null,
        ?array $tags = null,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['domain'] = $domain;
        $self['score'] = $score;
        $self['type'] = $type;
        $self['url'] = $url;

        null !== $authorFullName && $self['authorFullName'] = $authorFullName;
        null !== $category && $self['category'] = $category;
        null !== $combinedID && $self['combinedID'] = $combinedID;
        null !== $contentType && $self['contentType'] = $contentType;
        null !== $description && $self['description'] = $description;
        null !== $featuredImageURL && $self['featuredImageURL'] = $featuredImageURL;
        null !== $inBeta && $self['inBeta'] = $inBeta;
        null !== $isPrivate && $self['isPrivate'] = $isPrivate;
        null !== $language && $self['language'] = $language;
        null !== $publishedDate && $self['publishedDate'] = $publishedDate;
        null !== $rowID && $self['rowID'] = $rowID;
        null !== $subcategory && $self['subcategory'] = $subcategory;
        null !== $tableID && $self['tableID'] = $tableID;
        null !== $tags && $self['tags'] = $tags;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * The ID of the content.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The domain the document is hosted on.
     */
    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * The matching score of the document.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The url of the document.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Name of the author.
     */
    public function withAuthorFullName(string $authorFullName): self
    {
        $self = clone $this;
        $self['authorFullName'] = $authorFullName;

        return $self;
    }

    /**
     * The error category.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * The ID of the document in HubSpot.
     */
    public function withCombinedID(string $combinedID): self
    {
        $self = clone $this;
        $self['combinedID'] = $combinedID;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * The result's description. The content will be determined by the value of `length` in the request.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * URL of the featured image.
     */
    public function withFeaturedImageURL(string $featuredImageURL): self
    {
        $self = clone $this;
        $self['featuredImageURL'] = $featuredImageURL;

        return $self;
    }

    public function withInBeta(bool $inBeta): self
    {
        $self = clone $this;
        $self['inBeta'] = $inBeta;

        return $self;
    }

    public function withIsPrivate(bool $isPrivate): self
    {
        $self = clone $this;
        $self['isPrivate'] = $isPrivate;

        return $self;
    }

    /**
     * The document's language.
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
     * The date the content was published.
     */
    public function withPublishedDate(int $publishedDate): self
    {
        $self = clone $this;
        $self['publishedDate'] = $publishedDate;

        return $self;
    }

    /**
     * If a dynamic page, the row ID in the HubDB table.
     */
    public function withRowID(int $rowID): self
    {
        $self = clone $this;
        $self['rowID'] = $rowID;

        return $self;
    }

    /**
     * For knowledge articles, the subcategory of the article.
     */
    public function withSubcategory(string $subcategory): self
    {
        $self = clone $this;
        $self['subcategory'] = $subcategory;

        return $self;
    }

    /**
     * If a dynamic page, the ID of the HubDB table.
     */
    public function withTableID(int $tableID): self
    {
        $self = clone $this;
        $self['tableID'] = $tableID;

        return $self;
    }

    /**
     * If a blog post, the tags associated with it.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * The title of the returned document.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
