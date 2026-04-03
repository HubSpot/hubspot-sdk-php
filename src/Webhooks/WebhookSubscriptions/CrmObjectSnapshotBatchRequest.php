<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\WebhookSubscriptions\CrmObjectSnapshotRequest
 *
 * @phpstan-type CrmObjectSnapshotBatchRequestShape = array{
 *   snapshotRequests: list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape>
 * }
 */
final class CrmObjectSnapshotBatchRequest implements BaseModel
{
    /** @use SdkModel<CrmObjectSnapshotBatchRequestShape> */
    use SdkModel;

    /** @var list<CrmObjectSnapshotRequest> $snapshotRequests */
    #[Required(list: CrmObjectSnapshotRequest::class)]
    public array $snapshotRequests;

    /**
     * `new CrmObjectSnapshotBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CrmObjectSnapshotBatchRequest::with(snapshotRequests: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CrmObjectSnapshotBatchRequest)->withSnapshotRequests(...)
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
