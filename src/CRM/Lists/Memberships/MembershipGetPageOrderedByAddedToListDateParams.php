<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists\Memberships;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch the memberships of a list in order sorted by the time the records were added to the list.
 *
 * The `recordId`s are sorted in *ascending* order if an `after` offset or no offset is provided. If only a `before` offset is provided, then the records are sorted in *descending* order.
 *
 * The `after` offset parameter will take precedence over the `before` offset in a case where both are provided.
 *
 * @see HubspotSDK\CRM\Lists\Memberships->getPageOrderedByAddedToListDate
 *
 * @phpstan-type MembershipGetPageOrderedByAddedToListDateParamsShape = array{
 *   after?: string, before?: string, limit?: int
 * }
 */
final class MembershipGetPageOrderedByAddedToListDateParams implements BaseModel
{
    /** @use SdkModel<MembershipGetPageOrderedByAddedToListDateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging offset token for the page that comes `after` the previously requested records.
     *
     * If provided, then the records in the response will be the records following the offset, sorted in *ascending* order. Takes precedence over the `before` offset.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The paging offset token for the page that comes `before` the previously requested records.
     *
     * If provided, then the records in the response will be the records preceding the offset, sorted in *descending* order.
     */
    #[Api(optional: true)]
    public ?string $before;

    /**
     * The number of records to return in the response. The maximum `limit` is 250.
     */
    #[Api(optional: true)]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * The paging offset token for the page that comes `after` the previously requested records.
     *
     * If provided, then the records in the response will be the records following the offset, sorted in *ascending* order. Takes precedence over the `before` offset.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * The paging offset token for the page that comes `before` the previously requested records.
     *
     * If provided, then the records in the response will be the records preceding the offset, sorted in *descending* order.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * The number of records to return in the response. The maximum `limit` is 250.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
