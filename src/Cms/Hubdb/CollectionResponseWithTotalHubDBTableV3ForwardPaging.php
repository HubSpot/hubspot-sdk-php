<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseWithTotalHubDBTableV3ForwardPagingShape = array{
 *   results: list<HubDBTableV3>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalHubDBTableV3ForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalHubDBTableV3ForwardPagingShape> */
    use SdkModel;

    /** @var list<HubDBTableV3> $results */
    #[Required(list: HubDBTableV3::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalHubDBTableV3ForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalHubDBTableV3ForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalHubDBTableV3ForwardPaging)
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
     * @param list<HubDBTableV3|array{
     *   id: string,
     *   allowChildTables: bool,
     *   allowPublicAPIAccess: bool,
     *   columnCount: int,
     *   columns: list<Column>,
     *   createdAt: \DateTimeInterface,
     *   deleted: bool,
     *   deletedAt: \DateTimeInterface,
     *   dynamicMetaTags: array<string,int>,
     *   enableChildTablePages: bool,
     *   label: string,
     *   name: string,
     *   published: bool,
     *   publishedAt: \DateTimeInterface,
     *   rowCount: int,
     *   updatedAt: \DateTimeInterface,
     *   useForPages: bool,
     *   createdBy?: SimpleUser|null,
     *   isOrderedManually?: bool|null,
     *   updatedBy?: SimpleUser|null,
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
     * @param list<HubDBTableV3|array{
     *   id: string,
     *   allowChildTables: bool,
     *   allowPublicAPIAccess: bool,
     *   columnCount: int,
     *   columns: list<Column>,
     *   createdAt: \DateTimeInterface,
     *   deleted: bool,
     *   deletedAt: \DateTimeInterface,
     *   dynamicMetaTags: array<string,int>,
     *   enableChildTablePages: bool,
     *   label: string,
     *   name: string,
     *   published: bool,
     *   publishedAt: \DateTimeInterface,
     *   rowCount: int,
     *   updatedAt: \DateTimeInterface,
     *   useForPages: bool,
     *   createdBy?: SimpleUser|null,
     *   isOrderedManually?: bool|null,
     *   updatedBy?: SimpleUser|null,
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
