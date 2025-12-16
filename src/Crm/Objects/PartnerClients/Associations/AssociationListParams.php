<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients\Associations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * List associations of a partner client by type.
 *
 * @see HubspotSDK\Services\Crm\Objects\PartnerClients\AssociationsService::list()
 *
 * @phpstan-type AssociationListParamsShape = array{
 *   partnerClientID: string,
 *   after?: string|null,
 *   includeFa?: bool|null,
 *   limit?: int|null,
 * }
 */
final class AssociationListParams implements BaseModel
{
    /** @use SdkModel<AssociationListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $partnerClientID;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $includeFa;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * `new AssociationListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListParams::with(partnerClientID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationListParams)->withPartnerClientID(...)
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
        string $partnerClientID,
        ?string $after = null,
        ?bool $includeFa = null,
        ?int $limit = null,
    ): self {
        $self = new self;

        $self['partnerClientID'] = $partnerClientID;

        null !== $after && $self['after'] = $after;
        null !== $includeFa && $self['includeFa'] = $includeFa;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withPartnerClientID(string $partnerClientID): self
    {
        $self = clone $this;
        $self['partnerClientID'] = $partnerClientID;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withIncludeFa(bool $includeFa): self
    {
        $self = clone $this;
        $self['includeFa'] = $includeFa;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
