<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusBatchParams\Channel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusGetUnsubscribeAllStatusBatchParams); // set properties as needed
 * $client->marketing.subscriptions.v4.statuses->getUnsubscribeAllStatusBatch(...$params->toArray());
 * ```
 * Batch retrieve contacts who have opted out of all communications.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.statuses->getUnsubscribeAllStatusBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->getUnsubscribeAllStatusBatch
 *
 * @phpstan-type status_get_unsubscribe_all_status_batch_params = array{
 *   channel: Channel|value-of<Channel>, inputs: list<string>, businessUnitID?: int
 * }
 */
final class StatusGetUnsubscribeAllStatusBatchParams implements BaseModel
{
    /** @use SdkModel<status_get_unsubscribe_all_status_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    /** @var list<string> $inputs */
    #[Api(list: 'string')]
    public array $inputs;

    #[Api(optional: true)]
    public ?int $businessUnitID;

    /**
     * `new StatusGetUnsubscribeAllStatusBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusGetUnsubscribeAllStatusBatchParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusGetUnsubscribeAllStatusBatchParams)
     *   ->withChannel(...)
     *   ->withInputs(...)
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
     * @param Channel|value-of<Channel> $channel
     * @param list<string> $inputs
     */
    public static function with(
        Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj->inputs = $inputs;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    /**
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }
}
