<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CrmObjectSnapshotResponseShape from \HubSpotSDK\Webhooks\CrmObjectSnapshotResponse
 *
 * @phpstan-type CrmObjectSnapshotBatchResponseShape = array{
 *   snapshotResponses: list<CrmObjectSnapshotResponse|CrmObjectSnapshotResponseShape>,
 * }
 */
final class CrmObjectSnapshotBatchResponse implements BaseModel
{
    /** @use SdkModel<CrmObjectSnapshotBatchResponseShape> */
    use SdkModel;

    /** @var list<CrmObjectSnapshotResponse> $snapshotResponses */
    #[Required(list: CrmObjectSnapshotResponse::class)]
    public array $snapshotResponses;

    /**
     * `new CrmObjectSnapshotBatchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CrmObjectSnapshotBatchResponse::with(snapshotResponses: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CrmObjectSnapshotBatchResponse)->withSnapshotResponses(...)
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
     * @param list<CrmObjectSnapshotResponse|CrmObjectSnapshotResponseShape> $snapshotResponses
     */
    public static function with(array $snapshotResponses): self
    {
        $self = new self;

        $self['snapshotResponses'] = $snapshotResponses;

        return $self;
    }

    /**
     * @param list<CrmObjectSnapshotResponse|CrmObjectSnapshotResponseShape> $snapshotResponses
     */
    public function withSnapshotResponses(array $snapshotResponses): self
    {
        $self = clone $this;
        $self['snapshotResponses'] = $snapshotResponses;

        return $self;
    }
}
