<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Deletes multiple Marketing Events based on externalAccountId, externalEventId, and appId.
 *
 * Only Marketing Events created by the same apps will be deleted; events from other apps cannot be removed by this endpoint.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::deleteBatchByExternalEventID()
 *
 * @phpstan-type EventDeleteBatchByExternalEventIDParamsShape = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier|array{
 *     appID: int, externalAccountID: string, externalEventID: string
 *   }>,
 * }
 */
final class EventDeleteBatchByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventDeleteBatchByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Required(list: MarketingEventExternalUniqueIdentifier::class)]
    public array $inputs;

    /**
     * `new EventDeleteBatchByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDeleteBatchByExternalEventIDParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDeleteBatchByExternalEventIDParams)->withInputs(...)
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
     * @param list<MarketingEventExternalUniqueIdentifier|array{
     *   appID: int, externalAccountID: string, externalEventID: string
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventExternalUniqueIdentifier|array{
     *   appID: int, externalAccountID: string, externalEventID: string
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
