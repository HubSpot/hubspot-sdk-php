<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerServices\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * List associations of a partner service by type.
 *
 * @see HubspotSDK\Crm\Objects\PartnerServices\Associations->list
 *
 * @phpstan-type AssociationListParamsShape = array{
 *   partnerServiceId: string, after?: string, includeFA?: bool, limit?: int
 * }
 */
final class AssociationListParams implements BaseModel
{
    /** @use SdkModel<AssociationListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $partnerServiceId;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $includeFA;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * `new AssociationListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListParams::with(partnerServiceId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationListParams)->withPartnerServiceID(...)
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
     */
    public static function with(
        string $partnerServiceId,
        ?string $after = null,
        ?bool $includeFA = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        $obj->partnerServiceId = $partnerServiceId;

        null !== $after && $obj->after = $after;
        null !== $includeFA && $obj->includeFA = $includeFA;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    public function withPartnerServiceID(string $partnerServiceID): self
    {
        $obj = clone $this;
        $obj->partnerServiceId = $partnerServiceID;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withIncludeFa(bool $includeFa): self
    {
        $obj = clone $this;
        $obj->includeFA = $includeFa;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
