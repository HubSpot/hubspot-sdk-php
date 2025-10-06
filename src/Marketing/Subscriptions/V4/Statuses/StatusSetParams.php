<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\StatusState;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusSetParams); // set properties as needed
 * $client->marketing.subscriptions.v4.statuses->set(...$params->toArray());
 * ```
 * Update a contact's subscription status.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.statuses->set(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->set
 *
 * @phpstan-type status_set_params = array{
 *   channel: Channel|value-of<Channel>,
 *   statusState: StatusState|value-of<StatusState>,
 *   subscriptionID: int,
 *   legalBasis?: LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class StatusSetParams implements BaseModel
{
    /** @use SdkModel<status_set_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    /** @var value-of<StatusState> $statusState */
    #[Api(enum: StatusState::class)]
    public string $statusState;

    #[Api('subscriptionId')]
    public int $subscriptionID;

    /** @var value-of<LegalBasis>|null $legalBasis */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * `new StatusSetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusSetParams::with(channel: ..., statusState: ..., subscriptionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusSetParams)
     *   ->withChannel(...)
     *   ->withStatusState(...)
     *   ->withSubscriptionID(...)
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
     * @param StatusState|value-of<StatusState> $statusState
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public static function with(
        Channel|string $channel,
        StatusState|string $statusState,
        int $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj['statusState'] = $statusState;
        $obj->subscriptionID = $subscriptionID;

        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;

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
     * @param StatusState|value-of<StatusState> $statusState
     */
    public function withStatusState(StatusState|string $statusState): self
    {
        $obj = clone $this;
        $obj['statusState'] = $statusState;

        return $obj;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    /**
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }
}
