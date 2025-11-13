<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Updates multiple Marketing Events on the portal based on their objectId, if they exist.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::updateBatch()
 *
 * @phpstan-type EventUpdateBatchParamsShape = array{
 *   inputs: list<MarketingEventPublicUpdateRequestFullV2>
 * }
 */
final class EventUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<EventUpdateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventPublicUpdateRequestFullV2> $inputs */
    #[Api(list: MarketingEventPublicUpdateRequestFullV2::class)]
    public array $inputs;

    /**
     * `new EventUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventUpdateBatchParams)->withInputs(...)
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
     * @param list<MarketingEventPublicUpdateRequestFullV2> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventPublicUpdateRequestFullV2> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
