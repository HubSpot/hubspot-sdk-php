<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\ContentSearchResult\Language;
use HubspotSDK\Cms\SiteSearch\ContentSearchResult\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An individual search result.
 *
 * @phpstan-type ContentSearchResultShape = array{
 *   id: int,
 *   domain: string,
 *   score: float,
 *   type: value-of<Type>,
 *   url: string,
 *   authorFullName?: string|null,
 *   category?: string|null,
 *   combinedId?: string|null,
 *   description?: string|null,
 *   featuredImageUrl?: string|null,
 *   language?: value-of<Language>|null,
 *   publishedDate?: int|null,
 *   rowId?: int|null,
 *   subcategory?: string|null,
 *   tableId?: int|null,
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
     * For knowledge articles, the category of the article.
     */
    #[Optional]
    public ?string $category;

    /**
     * The ID of the document in HubSpot.
     */
    #[Optional]
    public ?string $combinedId;

    /**
     * The result's description. The content will be determined by the value of `length` in the request.
     */
    #[Optional]
    public ?string $description;

    /**
     * URL of the featured image.
     */
    #[Optional]
    public ?string $featuredImageUrl;

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
    #[Optional]
    public ?int $rowId;

    /**
     * For knowledge articles, the subcategory of the article.
     */
    #[Optional]
    public ?string $subcategory;

    /**
     * If a dynamic page, the ID of the HubDB table.
     */
    #[Optional]
    public ?int $tableId;

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
     * @param Language|value-of<Language> $language
     * @param list<string> $tags
     */
    public static function with(
        int $id,
        string $domain,
        float $score,
        Type|string $type,
        string $url,
        ?string $authorFullName = null,
        ?string $category = null,
        ?string $combinedId = null,
        ?string $description = null,
        ?string $featuredImageUrl = null,
        Language|string|null $language = null,
        ?int $publishedDate = null,
        ?int $rowId = null,
        ?string $subcategory = null,
        ?int $tableId = null,
        ?array $tags = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['domain'] = $domain;
        $obj['score'] = $score;
        $obj['type'] = $type;
        $obj['url'] = $url;

        null !== $authorFullName && $obj['authorFullName'] = $authorFullName;
        null !== $category && $obj['category'] = $category;
        null !== $combinedId && $obj['combinedId'] = $combinedId;
        null !== $description && $obj['description'] = $description;
        null !== $featuredImageUrl && $obj['featuredImageUrl'] = $featuredImageUrl;
        null !== $language && $obj['language'] = $language;
        null !== $publishedDate && $obj['publishedDate'] = $publishedDate;
        null !== $rowId && $obj['rowId'] = $rowId;
        null !== $subcategory && $obj['subcategory'] = $subcategory;
        null !== $tableId && $obj['tableId'] = $tableId;
        null !== $tags && $obj['tags'] = $tags;
        null !== $title && $obj['title'] = $title;

        return $obj;
    }

    /**
     * The ID of the content.
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The domain the document is hosted on.
     */
    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj['domain'] = $domain;

        return $obj;
    }

    /**
     * The matching score of the document.
     */
    public function withScore(float $score): self
    {
        $obj = clone $this;
        $obj['score'] = $score;

        return $obj;
    }

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The url of the document.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * Name of the author.
     */
    public function withAuthorFullName(string $authorFullName): self
    {
        $obj = clone $this;
        $obj['authorFullName'] = $authorFullName;

        return $obj;
    }

    /**
     * For knowledge articles, the category of the article.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    /**
     * The ID of the document in HubSpot.
     */
    public function withCombinedID(string $combinedID): self
    {
        $obj = clone $this;
        $obj['combinedId'] = $combinedID;

        return $obj;
    }

    /**
     * The result's description. The content will be determined by the value of `length` in the request.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * URL of the featured image.
     */
    public function withFeaturedImageURL(string $featuredImageURL): self
    {
        $obj = clone $this;
        $obj['featuredImageUrl'] = $featuredImageURL;

        return $obj;
    }

    /**
     * The document's language.
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
     * The date the content was published.
     */
    public function withPublishedDate(int $publishedDate): self
    {
        $obj = clone $this;
        $obj['publishedDate'] = $publishedDate;

        return $obj;
    }

    /**
     * If a dynamic page, the row ID in the HubDB table.
     */
    public function withRowID(int $rowID): self
    {
        $obj = clone $this;
        $obj['rowId'] = $rowID;

        return $obj;
    }

    /**
     * For knowledge articles, the subcategory of the article.
     */
    public function withSubcategory(string $subcategory): self
    {
        $obj = clone $this;
        $obj['subcategory'] = $subcategory;

        return $obj;
    }

    /**
     * If a dynamic page, the ID of the HubDB table.
     */
    public function withTableID(int $tableID): self
    {
        $obj = clone $this;
        $obj['tableId'] = $tableID;

        return $obj;
    }

    /**
     * If a blog post, the tags associated with it.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * The title of the returned document.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }
}
