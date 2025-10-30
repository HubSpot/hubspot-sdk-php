<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel;

/**
 * Unsubscribe a set of contacts from all email subscriptions.
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->batchUnsubscribeAll
 *
 * @phpstan-type StatusBatchUnsubscribeAllParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   inputs: list<string>,
 *   businessUnitID?: int,
 *   verbose?: bool,
 * }
 */
final class StatusBatchUnsubscribeAllParams implements BaseModel
{
    /** @use SdkModel<StatusBatchUnsubscribeAllParamsShape> */
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
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Api(list: 'string')]
    public array $inputs;

    /**
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    #[Api(optional: true)]
    public ?int $businessUnitID;

    /**
     * Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     */
    #[Api(optional: true)]
    public ?bool $verbose;

    /**
     * `new StatusBatchUnsubscribeAllParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusBatchUnsubscribeAllParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusBatchUnsubscribeAllParams)->withChannel(...)->withInputs(...)
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
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    /**
     * Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     */
    public function withVerbose(bool $verbose): self
    {
        $obj = clone $this;
        $obj->verbose = $verbose;

        return $obj;
    }
}
