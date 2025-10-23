<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Deletes multiple Marketing Events based on externalAccountId, externalEventId, and appId.
 *
 * Only Marketing Events created by the same apps will be deleted; events from other apps cannot be removed by this endpoint.
 *
 * @see HubspotSDK\Marketing\MarketingEvents->deleteBatchByExternalEventID
 *
 * @phpstan-type marketing_event_delete_batch_by_external_event_id_params = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier>
 * }
 */
final class MarketingEventDeleteBatchByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<marketing_event_delete_batch_by_external_event_id_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Api(list: MarketingEventExternalUniqueIdentifier::class)]
    public array $inputs;

    /**
     * `new MarketingEventDeleteBatchByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventDeleteBatchByExternalEventIDParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventDeleteBatchByExternalEventIDParams)->withInputs(...)
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
     * @param list<MarketingEventExternalUniqueIdentifier> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventExternalUniqueIdentifier> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
