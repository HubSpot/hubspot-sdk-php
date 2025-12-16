<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RecordListMembershipShape from \HubspotSDK\Crm\Lists\RecordListMembership
 *
 * @phpstan-type APICollectionResponseRecordListMembershipNoPagingShape = array{
 *   results: list<RecordListMembershipShape>, total?: int|null
 * }
 */
final class APICollectionResponseRecordListMembershipNoPaging implements BaseModel
{
    /** @use SdkModel<APICollectionResponseRecordListMembershipNoPagingShape> */
    use SdkModel;

    /** @var list<RecordListMembership> $results */
    #[Required(list: RecordListMembership::class)]
    public array $results;

    #[Optional]
    public ?int $total;

    /**
     * `new APICollectionResponseRecordListMembershipNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICollectionResponseRecordListMembershipNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APICollectionResponseRecordListMembershipNoPaging)->withResults(...)
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
     * @param list<RecordListMembershipShape> $results
     */
    public static function with(array $results, ?int $total = null): self
    {
        $self = new self;

        $self['results'] = $results;

        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<RecordListMembershipShape> $results
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
}
