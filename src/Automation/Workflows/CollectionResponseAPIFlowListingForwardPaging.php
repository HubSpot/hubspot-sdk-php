<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseAPIFlowListingForwardPagingShape = array{
 *   results: list<APIFlowListing>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseAPIFlowListingForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseAPIFlowListingForwardPagingShape> */
    use SdkModel;

    /** @var list<APIFlowListing> $results */
    #[Required(list: APIFlowListing::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseAPIFlowListingForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAPIFlowListingForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAPIFlowListingForwardPaging)->withResults(...)
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
     * @param list<APIFlowListing|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   flowType: string,
     *   isEnabled: bool,
     *   objectTypeId: string,
     *   revisionId: string,
     *   updatedAt: \DateTimeInterface,
     *   name?: string|null,
     *   uuid?: string|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<APIFlowListing|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   flowType: string,
     *   isEnabled: bool,
     *   objectTypeId: string,
     *   revisionId: string,
     *   updatedAt: \DateTimeInterface,
     *   name?: string|null,
     *   uuid?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

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
