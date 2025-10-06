<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusGetParams); // set properties as needed
 * $client->marketing.subscriptions.v4.statuses->get(...$params->toArray());
 * ```
 * Get subscription preferences for a specific contact.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.statuses->get(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->get
 *
 * @phpstan-type status_get_params = array{
 *   channel: Channel|value-of<Channel>, businessUnitID?: int
 * }
 */
final class StatusGetParams implements BaseModel
{
    /** @use SdkModel<status_get_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    #[Api(optional: true)]
    public ?int $businessUnitID;

    /**
     * `new StatusGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusGetParams::with(channel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusGetParams)->withChannel(...)
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
        ?int $businessUnitID = null
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;

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

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }
}
