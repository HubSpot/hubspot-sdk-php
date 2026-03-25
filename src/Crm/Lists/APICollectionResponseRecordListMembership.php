<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-import-type RecordListMembershipShape from \HubspotSDK\Crm\Lists\RecordListMembership
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type APICollectionResponseRecordListMembershipShape = array{
 *   results: list<RecordListMembership|RecordListMembershipShape>,
 *   paging?: null|Paging|PagingShape,
 *   total?: int|null,
 * }
 */
final class APICollectionResponseRecordListMembership implements BaseModel
{
    /** @use SdkModel<APICollectionResponseRecordListMembershipShape> */
    use SdkModel;

    /** @var list<RecordListMembership> $results */
    #[Required(list: RecordListMembership::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    #[Optional]
    public ?int $total;

    /**
     * `new APICollectionResponseRecordListMembership()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICollectionResponseRecordListMembership::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APICollectionResponseRecordListMembership)->withResults(...)
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
     * @param list<RecordListMembership|RecordListMembershipShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null,
        ?int $total = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<RecordListMembership|RecordListMembershipShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
