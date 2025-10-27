<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\MarketingEventPublicObjectIDDeleteRequest;

/**
 * Deletes multiple Marketing Events from the portal based on their objectId, if they exist.
 *
 * Responses:
 * 204: Returned if all specified Marketing Events were successfully deleted.
 * 207: Returned if some objectIds did not correspond to any existing Marketing Events.
 *
 * @see HubspotSDK\Marketing\Events->deleteBatch
 *
 * @phpstan-type event_delete_batch_params = array{
 *   inputs: list<MarketingEventPublicObjectIDDeleteRequest>
 * }
 */
final class EventDeleteBatchParams implements BaseModel
{
    /** @use SdkModel<event_delete_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventPublicObjectIDDeleteRequest> $inputs */
    #[Api(list: MarketingEventPublicObjectIDDeleteRequest::class)]
    public array $inputs;

    /**
     * `new EventDeleteBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDeleteBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDeleteBatchParams)->withInputs(...)
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
     * @param list<MarketingEventPublicObjectIDDeleteRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventPublicObjectIDDeleteRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
