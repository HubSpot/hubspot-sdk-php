<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusUnsubscribeAllParams); // set properties as needed
 * $client->marketing.subscriptions.v4.statuses->unsubscribeAll(...$params->toArray());
 * ```
 * Unsubscribe a contact from all subscriptions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.statuses->unsubscribeAll(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->unsubscribeAll
 *
 * @phpstan-type status_unsubscribe_all_params = array{
 *   channel: Channel|value-of<Channel>, businessUnitID?: int, verbose?: bool
 * }
 */
final class StatusUnsubscribeAllParams implements BaseModel
{
    /** @use SdkModel<status_unsubscribe_all_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    #[Api(optional: true)]
    public ?int $businessUnitID;

    #[Api(optional: true)]
    public ?bool $verbose;

    /**
     * `new StatusUnsubscribeAllParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusUnsubscribeAllParams::with(channel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusUnsubscribeAllParams)->withChannel(...)
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
     */
    public static function with(
        Channel|string $channel,
        ?int $businessUnitID = null,
        ?bool $verbose = null
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;

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
