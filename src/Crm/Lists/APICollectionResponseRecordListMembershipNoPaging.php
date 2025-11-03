<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APICollectionResponseRecordListMembershipNoPagingShape = array{
 *   results: list<RecordListMembership>, total?: int
 * }
 */
final class APICollectionResponseRecordListMembershipNoPaging implements BaseModel
{
    /** @use SdkModel<APICollectionResponseRecordListMembershipNoPagingShape> */
    use SdkModel;

    /** @var list<RecordListMembership> $results */
    #[Api(list: RecordListMembership::class)]
    public array $results;

    #[Api(optional: true)]
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
     * @param list<RecordListMembership> $results
     */
    public static function with(array $results, ?int $total = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $total && $obj->total = $total;

        return $obj;
    }

    /**
     * @param list<RecordListMembership> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
