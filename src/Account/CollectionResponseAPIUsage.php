<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Account\APIUsage\FetchStatus;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponseAPIUsageShape = array{
 *   results: list<APIUsage>, paging?: Paging|null
 * }
 */
final class CollectionResponseAPIUsage implements BaseModel
{
    /** @use SdkModel<CollectionResponseAPIUsageShape> */
    use SdkModel;

    /** @var list<APIUsage> $results */
    #[Api(list: APIUsage::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseAPIUsage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAPIUsage::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAPIUsage)->withResults(...)
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
     * @param list<APIUsage|array{
     *   collectedAt: \DateTimeInterface,
     *   currentUsage: int,
     *   fetchStatus: value-of<FetchStatus>,
     *   name: string,
     *   usageLimit: int,
     *   resetsAt?: \DateTimeInterface|null,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<APIUsage|array{
     *   collectedAt: \DateTimeInterface,
     *   currentUsage: int,
     *   fetchStatus: value-of<FetchStatus>,
     *   name: string,
     *   usageLimit: int,
     *   resetsAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
