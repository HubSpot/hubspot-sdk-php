<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\ContentSearchResult\Language;
use HubspotSDK\Cms\SiteSearch\ContentSearchResult\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An individual search result.
 *
 * @phpstan-type content_search_result = array{
 *   id: int,
 *   domain: string,
 *   score: float,
 *   type: value-of<Type>,
 *   url: string,
 *   authorFullName?: string,
 *   category?: string,
 *   combinedID?: string,
 *   description?: string,
 *   featuredImageURL?: string,
 *   language?: value-of<Language>,
 *   publishedDate?: int,
 *   rowID?: int,
 *   subcategory?: string,
 *   tableID?: int,
 *   tags?: list<string>,
 *   title?: string,
 * }
 */
final class ContentSearchResult implements BaseModel
{
    /** @use SdkModel<content_search_result> */
    use SdkModel;

    /**
     * The ID of the content.
     */
    #[Api]
    public int $id;

    /**
     * The domain the document is hosted on.
     */
    #[Api]
    public string $domain;

    /**
     * The matching score of the document.
     */
    #[Api]
    public float $score;

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The url of the document.
     */
    #[Api]
    public string $url;

    /**
     * Name of the author.
     */
    #[Api(optional: true)]
    public ?string $authorFullName;

    /**
     * For knowledge articles, the category of the article.
     */
    #[Api(optional: true)]
    public ?string $category;

    /**
     * The ID of the document in HubSpot.
     */
    #[Api('combinedId', optional: true)]
    public ?string $combinedID;

    /**
     * The result's description. The content will be determined by the value of `length` in the request.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * URL of the featured image.
     */
    #[Api('featuredImageUrl', optional: true)]
    public ?string $featuredImageURL;

    /**
     * The document's language.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * The date the content was published.
     */
    #[Api(optional: true)]
    public ?int $publishedDate;

    /**
     * If a dynamic page, the row ID in the HubDB table.
     */
    #[Api('rowId', optional: true)]
    public ?int $rowID;

    /**
     * For knowledge articles, the subcategory of the article.
     */
    #[Api(optional: true)]
    public ?string $subcategory;

    /**
     * If a dynamic page, the ID of the HubDB table.
     */
    #[Api('tableId', optional: true)]
    public ?int $tableID;

    /**
     * If a blog post, the tags associated with it.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * The title of the returned document.
     */
    #[Api(optional: true)]
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
        ?string $combinedID = null,
        ?string $description = null,
        ?string $featuredImageURL = null,
        Language|string|null $language = null,
        ?int $publishedDate = null,
        ?int $rowID = null,
        ?string $subcategory = null,
        ?int $tableID = null,
        ?array $tags = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->domain = $domain;
        $obj->score = $score;
        $obj['type'] = $type;
        $obj->url = $url;

        null !== $authorFullName && $obj->authorFullName = $authorFullName;
        null !== $category && $obj->category = $category;
        null !== $combinedID && $obj->combinedID = $combinedID;
        null !== $description && $obj->description = $description;
        null !== $featuredImageURL && $obj->featuredImageURL = $featuredImageURL;
        null !== $language && $obj['language'] = $language;
        null !== $publishedDate && $obj->publishedDate = $publishedDate;
        null !== $rowID && $obj->rowID = $rowID;
        null !== $subcategory && $obj->subcategory = $subcategory;
        null !== $tableID && $obj->tableID = $tableID;
        null !== $tags && $obj->tags = $tags;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    /**
     * The ID of the content.
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The domain the document is hosted on.
     */
    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj->domain = $domain;

        return $obj;
    }

    /**
     * The matching score of the document.
     */
    public function withScore(float $score): self
    {
        $obj = clone $this;
        $obj->score = $score;

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
        $obj->url = $url;

        return $obj;
    }

    /**
     * Name of the author.
     */
    public function withAuthorFullName(string $authorFullName): self
    {
        $obj = clone $this;
        $obj->authorFullName = $authorFullName;

        return $obj;
    }

    /**
     * For knowledge articles, the category of the article.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    /**
     * The ID of the document in HubSpot.
     */
    public function withCombinedID(string $combinedID): self
    {
        $obj = clone $this;
        $obj->combinedID = $combinedID;

        return $obj;
    }

    /**
     * The result's description. The content will be determined by the value of `length` in the request.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * URL of the featured image.
     */
    public function withFeaturedImageURL(string $featuredImageURL): self
    {
        $obj = clone $this;
        $obj->featuredImageURL = $featuredImageURL;

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
        $obj->publishedDate = $publishedDate;

        return $obj;
    }

    /**
     * If a dynamic page, the row ID in the HubDB table.
     */
    public function withRowID(int $rowID): self
    {
        $obj = clone $this;
        $obj->rowID = $rowID;

        return $obj;
    }

    /**
     * For knowledge articles, the subcategory of the article.
     */
    public function withSubcategory(string $subcategory): self
    {
        $obj = clone $this;
        $obj->subcategory = $subcategory;

        return $obj;
    }

    /**
     * If a dynamic page, the ID of the HubDB table.
     */
    public function withTableID(int $tableID): self
    {
        $obj = clone $this;
        $obj->tableID = $tableID;

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
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * The title of the returned document.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
