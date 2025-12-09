<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Cms\Blogs\Authors\BlogAuthor\Language;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * Response object for collections of blog authors with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalBlogAuthorForwardPagingShape = array{
 *   results: list<BlogAuthor>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalBlogAuthorForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalBlogAuthorForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of blog authors.
     *
     * @var list<BlogAuthor> $results
     */
    #[Required(list: BlogAuthor::class)]
    public array $results;

    /**
     * Total number of blog authors.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalBlogAuthorForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalBlogAuthorForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalBlogAuthorForwardPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<BlogAuthor|array{
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
     *   translatedFromId: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * Collection of blog authors.
     *
     * @param list<BlogAuthor|array{
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
     *   translatedFromId: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Total number of blog authors.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
