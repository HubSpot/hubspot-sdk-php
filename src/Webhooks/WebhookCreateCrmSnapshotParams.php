<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\WebhooksService::createCrmSnapshot()
 *
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\CrmObjectSnapshotRequest
 *
 * @phpstan-type WebhookCreateCrmSnapshotParamsShape = array{
 *   snapshotRequests: list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape>
 * }
 */
final class WebhookCreateCrmSnapshotParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateCrmSnapshotParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<CrmObjectSnapshotRequest> $snapshotRequests */
    #[Required(list: CrmObjectSnapshotRequest::class)]
    public array $snapshotRequests;

    /**
     * `new WebhookCreateCrmSnapshotParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateCrmSnapshotParams::with(snapshotRequests: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateCrmSnapshotParams)->withSnapshotRequests(...)
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
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests
     */
    public function withSnapshotRequests(array $snapshotRequests): self
    {
        $self = clone $this;
        $self['snapshotRequests'] = $snapshotRequests;

        return $self;
    }
}
