<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel;

/**
 * Unsubscribe a contact from all email subscriptions.
 *
 * @see HubspotSDK\Services\Marketing\Subscriptions\V4\StatusesService::unsubscribeAll()
 *
 * @phpstan-type StatusUnsubscribeAllParamsShape = array{
 *   channel: Channel|value-of<Channel>, businessUnitId?: int, verbose?: bool
 * }
 */
final class StatusUnsubscribeAllParams implements BaseModel
{
    /** @use SdkModel<StatusUnsubscribeAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     *
     * @var value-of<Channel> $channel
     */
    #[Api(enum: Channel::class)]
    public string $channel;

    /**
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    #[Api(optional: true)]
    public ?int $businessUnitId;

    /**
     * Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     */
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
        ?int $businessUnitId = null,
        ?bool $verbose = null
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;

        null !== $businessUnitId && $obj['businessUnitId'] = $businessUnitId;
        null !== $verbose && $obj['verbose'] = $verbose;

        return $obj;
    }

    /**
     * The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     *
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    /**
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj['businessUnitId'] = $businessUnitID;

        return $obj;
    }

    /**
     * Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     */
    public function withVerbose(bool $verbose): self
    {
        $obj = clone $this;
        $obj['verbose'] = $verbose;

        return $obj;
    }
}
