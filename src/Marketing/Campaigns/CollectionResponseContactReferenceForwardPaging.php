<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseContactReferenceForwardPagingShape = array{
 *   results: list<ContactReference>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseContactReferenceForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseContactReferenceForwardPagingShape> */
    use SdkModel;

    /** @var list<ContactReference> $results */
    #[Api(list: ContactReference::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseContactReferenceForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseContactReferenceForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseContactReferenceForwardPaging)->withResults(...)
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
     * @param list<ContactReference|array{id: string}> $results
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
     * @param list<ContactReference|array{id: string}> $results
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
