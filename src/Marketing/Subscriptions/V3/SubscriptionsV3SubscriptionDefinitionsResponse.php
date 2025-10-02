<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsSubscriptionDefinition;

/**
 * @phpstan-type subscriptions_v3_subscription_definitions_response = array{
 *   subscriptionDefinitions: list<MarketingSubscriptionsSubscriptionDefinition>
 * }
 */
final class SubscriptionsV3SubscriptionDefinitionsResponse implements BaseModel
{
    /** @use SdkModel<subscriptions_v3_subscription_definitions_response> */
    use SdkModel;

    /**
     * @var list<MarketingSubscriptionsSubscriptionDefinition> $subscriptionDefinitions
     */
    #[Api(list: MarketingSubscriptionsSubscriptionDefinition::class)]
    public array $subscriptionDefinitions;

    /**
     * `new SubscriptionsV3SubscriptionDefinitionsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionsV3SubscriptionDefinitionsResponse::with(
     *   subscriptionDefinitions: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionsV3SubscriptionDefinitionsResponse)
     *   ->withSubscriptionDefinitions(...)
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
     * @param list<MarketingSubscriptionsSubscriptionDefinition> $subscriptionDefinitions
     */
    public static function with(array $subscriptionDefinitions): self
    {
        $obj = new self;

        $obj->subscriptionDefinitions = $subscriptionDefinitions;

        return $obj;
    }

    /**
     * @param list<MarketingSubscriptionsSubscriptionDefinition> $subscriptionDefinitions
     */
    public function withSubscriptionDefinitions(
        array $subscriptionDefinitions
    ): self {
        $obj = clone $this;
        $obj->subscriptionDefinitions = $subscriptionDefinitions;

        return $obj;
    }
}
