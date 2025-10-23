<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Upserts multiple Marketing Events. If a Marketing Event with the specified ID already exists, it will be updated; otherwise, a new event will be created.
 *
 * Only Marketing Events originally created by the same app can be updated.
 *
 * @see HubspotSDK\Marketing\MarketingEvents->upsertBatch
 *
 * @phpstan-type marketing_event_upsert_batch_params = array{
 *   inputs: list<MarketingEventCreateRequestParams>
 * }
 */
final class MarketingEventUpsertBatchParams implements BaseModel
{
    /** @use SdkModel<marketing_event_upsert_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventCreateRequestParams> $inputs */
    #[Api(list: MarketingEventCreateRequestParams::class)]
    public array $inputs;

    /**
     * `new MarketingEventUpsertBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventUpsertBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventUpsertBatchParams)->withInputs(...)
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
     * @param list<MarketingEventCreateRequestParams> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventCreateRequestParams> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
