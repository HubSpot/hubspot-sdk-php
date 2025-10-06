<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WebhookUpdateBatchParams); // set properties as needed
 * $client->webhooks->updateBatch(...$params->toArray());
 * ```
 * Batch create event subscriptions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->webhooks->updateBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Webhooks->updateBatch
 *
 * @phpstan-type webhook_update_batch_params = array{
 *   inputs: list<SubscriptionBatchUpdateRequest>
 * }
 */
final class WebhookUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<webhook_update_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Api(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new WebhookUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookUpdateBatchParams)->withInputs(...)
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
     * @param list<SubscriptionBatchUpdateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SubscriptionBatchUpdateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
