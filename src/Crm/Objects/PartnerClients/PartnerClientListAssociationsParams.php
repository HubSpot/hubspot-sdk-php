<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of associations for a specific partner client based on the specified object type.
 *
 * @see HubspotSDK\Services\Crm\Objects\PartnerClientsService::listAssociations()
 *
 * @phpstan-type PartnerClientListAssociationsParamsShape = array{
 *   partnerClientID: string, after?: string|null, limit?: int|null
 * }
 */
final class PartnerClientListAssociationsParams implements BaseModel
{
    /** @use SdkModel<PartnerClientListAssociationsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $partnerClientID;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * `new PartnerClientListAssociationsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PartnerClientListAssociationsParams::with(partnerClientID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PartnerClientListAssociationsParams)->withPartnerClientID(...)
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
        ?int $limit = null
    ): self {
        $self = new self;

        $self['partnerClientID'] = $partnerClientID;

        null !== $after && $self['after'] = $after;
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
