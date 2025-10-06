<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type subscription_definitions_response = array{
 *   subscriptionDefinitions: list<SubscriptionDefinition>
 * }
 */
final class SubscriptionDefinitionsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<subscription_definitions_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<SubscriptionDefinition> $subscriptionDefinitions */
    #[Api(list: SubscriptionDefinition::class)]
    public array $subscriptionDefinitions;

    /**
     * `new SubscriptionDefinitionsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionDefinitionsResponse::with(subscriptionDefinitions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionDefinitionsResponse)->withSubscriptionDefinitions(...)
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
     * @param list<SubscriptionDefinition> $subscriptionDefinitions
     */
    public static function with(array $subscriptionDefinitions): self
    {
        $obj = new self;

        $obj->subscriptionDefinitions = $subscriptionDefinitions;

        return $obj;
    }

    /**
     * @param list<SubscriptionDefinition> $subscriptionDefinitions
     */
    public function withSubscriptionDefinitions(
        array $subscriptionDefinitions
    ): self {
        $obj = clone $this;
        $obj->subscriptionDefinitions = $subscriptionDefinitions;

        return $obj;
    }
}
