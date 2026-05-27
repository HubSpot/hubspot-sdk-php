<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\CrmObjectSnapshotRequest;

/**
 * Create a batch of CRM object snapshots in HubSpot. This endpoint is used to capture the current state of specified CRM objects for later reference or analysis. It requires a JSON payload containing the details of the CRM objects to snapshot. This operation is exempt from daily and ten-secondly rate limits.
 *
 * @see HubSpotSDK\Services\WebhooksService::createCrmSnapshots()
 *
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\CrmObjectSnapshotRequest
 *
 * @phpstan-type WebhookCreateCrmSnapshotsParamsShape = array{
 *   snapshotRequests: list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape>
 * }
 */
final class WebhookCreateCrmSnapshotsParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateCrmSnapshotsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of CrmObjectSnapshotRequest objects, each representing a request to create a snapshot for a specific CRM object. This property is required.
     *
     * @var list<CrmObjectSnapshotRequest> $snapshotRequests
     */
    #[Required(list: CrmObjectSnapshotRequest::class)]
    public array $snapshotRequests;

    /**
     * `new WebhookCreateCrmSnapshotsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateCrmSnapshotsParams::with(snapshotRequests: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateCrmSnapshotsParams)->withSnapshotRequests(...)
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
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests
     */
    public static function with(array $snapshotRequests): self
    {
        $self = new self;

        $self['snapshotRequests'] = $snapshotRequests;

        return $self;
    }

    /**
     * An array of CrmObjectSnapshotRequest objects, each representing a request to create a snapshot for a specific CRM object. This property is required.
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests
     */
    public function withSnapshotRequests(array $snapshotRequests): self
    {
        $self = clone $this;
        $self['snapshotRequests'] = $snapshotRequests;

        return $self;
    }
}
