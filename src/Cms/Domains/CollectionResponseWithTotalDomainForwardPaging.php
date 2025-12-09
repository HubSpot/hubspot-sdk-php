<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Domains;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseWithTotalDomainForwardPagingShape = array{
 *   results: list<Domain>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalDomainForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalDomainForwardPagingShape> */
    use SdkModel;

    /** @var list<Domain> $results */
    #[Required(list: Domain::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalDomainForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalDomainForwardPaging::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalDomainForwardPaging)
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
     * @param list<Domain|array{
     *   id: string,
     *   domain: string,
     *   isResolving: bool,
     *   isUsedForBlogPost: bool,
     *   isUsedForEmail: bool,
     *   isUsedForKnowledge: bool,
     *   isUsedForLandingPage: bool,
     *   isUsedForSitePage: bool,
     *   correctCname?: string|null,
     *   created?: \DateTimeInterface|null,
     *   isSslEnabled?: bool|null,
     *   isSslOnly?: bool|null,
     *   manuallyMarkedAsResolving?: bool|null,
     *   primaryBlogPost?: bool|null,
     *   primaryEmail?: bool|null,
     *   primaryKnowledge?: bool|null,
     *   primaryLandingPage?: bool|null,
     *   primarySitePage?: bool|null,
     *   secondaryToDomain?: string|null,
     *   updated?: \DateTimeInterface|null,
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
     * @param list<Domain|array{
     *   id: string,
     *   domain: string,
     *   isResolving: bool,
     *   isUsedForBlogPost: bool,
     *   isUsedForEmail: bool,
     *   isUsedForKnowledge: bool,
     *   isUsedForLandingPage: bool,
     *   isUsedForSitePage: bool,
     *   correctCname?: string|null,
     *   created?: \DateTimeInterface|null,
     *   isSslEnabled?: bool|null,
     *   isSslOnly?: bool|null,
     *   manuallyMarkedAsResolving?: bool|null,
     *   primaryBlogPost?: bool|null,
     *   primaryEmail?: bool|null,
     *   primaryKnowledge?: bool|null,
     *   primaryLandingPage?: bool|null,
     *   primarySitePage?: bool|null,
     *   secondaryToDomain?: string|null,
     *   updated?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

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
