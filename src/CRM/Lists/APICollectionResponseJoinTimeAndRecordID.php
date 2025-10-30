<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * @phpstan-type APICollectionResponseJoinTimeAndRecordIDShape = array{
 *   results: list<JoinTimeAndRecordID>, paging?: Paging, total?: int
 * }
 */
final class APICollectionResponseJoinTimeAndRecordID implements BaseModel
{
    /** @use SdkModel<APICollectionResponseJoinTimeAndRecordIDShape> */
    use SdkModel;

    /** @var list<JoinTimeAndRecordID> $results */
    #[Api(list: JoinTimeAndRecordID::class)]
    public array $results;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    #[Api(optional: true)]
    public ?int $total;

    /**
     * `new APICollectionResponseJoinTimeAndRecordID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICollectionResponseJoinTimeAndRecordID::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APICollectionResponseJoinTimeAndRecordID)->withResults(...)
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
     * @param list<JoinTimeAndRecordID> $results
     */
    public static function with(
        array $results,
        ?Paging $paging = null,
        ?int $total = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;
        null !== $total && $obj->total = $total;

        return $obj;
    }

    /**
     * @param list<JoinTimeAndRecordID> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
