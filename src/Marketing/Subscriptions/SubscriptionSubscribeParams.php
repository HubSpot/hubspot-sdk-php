<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SubscriptionSubscribeParams); // set properties as needed
 * $client->marketing.subscriptions->subscribe(...$params->toArray());
 * ```
 * Subscribe a contact.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions->subscribe(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions->subscribe
 *
 * @phpstan-type subscription_subscribe_params = array{
 *   emailAddress: string,
 *   subscriptionID: string,
 *   legalBasis?: LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class SubscriptionSubscribeParams implements BaseModel
{
    /** @use SdkModel<subscription_subscribe_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailAddress;

    #[Api('subscriptionId')]
    public string $subscriptionID;

    /** @var value-of<LegalBasis>|null $legalBasis */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * `new SubscriptionSubscribeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionSubscribeParams::with(emailAddress: ..., subscriptionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionSubscribeParams)
     *   ->withEmailAddress(...)
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
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public static function with(
        string $emailAddress,
        string $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $obj = new self;

        $obj->emailAddress = $emailAddress;
        $obj->subscriptionID = $subscriptionID;

        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    public function withEmailAddress(string $emailAddress): self
    {
        $obj = clone $this;
        $obj->emailAddress = $emailAddress;

        return $obj;
    }

    public function withSubscriptionID(string $subscriptionID): self
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
