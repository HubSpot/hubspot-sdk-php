<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Cms\Blogs\Settings\Blog\Language;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * Response object for collections of blogs with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalBlogForwardPagingShape = array{
 *   results: list<Blog>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalBlogForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalBlogForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of blogs.
     *
     * @var list<Blog> $results
     */
    #[Required(list: Blog::class)]
    public array $results;

    /**
     * Total number of blogs.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalBlogForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalBlogForwardPaging::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalBlogForwardPaging)
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
     * @param list<Blog|array{
     *   id: string,
     *   absoluteURL: string,
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
     *   translatedFromID: string,
     *   updated: \DateTimeInterface,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * Collection of blogs.
     *
     * @param list<Blog|array{
     *   id: string,
     *   absoluteURL: string,
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
     *   translatedFromID: string,
     *   updated: \DateTimeInterface,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Total number of blogs.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
