<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllBatchParams\Channel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusUnsubscribeAllBatchParams); // set properties as needed
 * $client->marketing.subscriptions.v4.statuses->unsubscribeAllBatch(...$params->toArray());
 * ```
 * Batch unsubscribe contacts from all subscriptions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.statuses->unsubscribeAllBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->unsubscribeAllBatch
 *
 * @phpstan-type status_unsubscribe_all_batch_params = array{
 *   channel: Channel|value-of<Channel>,
 *   inputs: list<string>,
 *   businessUnitID?: int,
 *   verbose?: bool,
 * }
 */
final class StatusUnsubscribeAllBatchParams implements BaseModel
{
    /** @use SdkModel<status_unsubscribe_all_batch_params> */
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

    #[Api(optional: true)]
    public ?bool $verbose;

    /**
     * `new StatusUnsubscribeAllBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusUnsubscribeAllBatchParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusUnsubscribeAllBatchParams)->withChannel(...)->withInputs(...)
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
        ?int $businessUnitID = null,
        ?bool $verbose = null,
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj->inputs = $inputs;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $verbose && $obj->verbose = $verbose;

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

    public function withVerbose(bool $verbose): self
    {
        $obj = clone $this;
        $obj->verbose = $verbose;

        return $obj;
    }
}
