<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusUpdateBatchParams); // set properties as needed
 * $client->marketing.subscriptions.v4.statuses->updateBatch(...$params->toArray());
 * ```
 * Batch update subscription status.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.statuses->updateBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->updateBatch
 *
 * @phpstan-type status_update_batch_params = array{
 *   inputs: list<PublicStatusRequest>
 * }
 */
final class StatusUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<status_update_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicStatusRequest> $inputs */
    #[Api(list: PublicStatusRequest::class)]
    public array $inputs;

    /**
     * `new StatusUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusUpdateBatchParams)->withInputs(...)
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
     * @param list<PublicStatusRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicStatusRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
