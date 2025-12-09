<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriptionDefinitionsResponseShape = array{
 *   subscriptionDefinitions: list<SubscriptionDefinition>
 * }
 */
final class SubscriptionDefinitionsResponse implements BaseModel
{
    /** @use SdkModel<SubscriptionDefinitionsResponseShape> */
    use SdkModel;

    /**
     * A list of all subscription definitions.
     *
     * @var list<SubscriptionDefinition> $subscriptionDefinitions
     */
    #[Required(list: SubscriptionDefinition::class)]
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
     * @param list<SubscriptionDefinition|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   description: string,
     *   isActive: bool,
     *   isDefault: bool,
     *   isInternal: bool,
     *   name: string,
     *   updatedAt: \DateTimeInterface,
     *   businessUnitID?: int|null,
     *   communicationMethod?: string|null,
     *   purpose?: string|null,
     * }> $subscriptionDefinitions
     */
    public static function with(array $subscriptionDefinitions): self
    {
        $self = new self;

        $self['subscriptionDefinitions'] = $subscriptionDefinitions;

        return $self;
    }

    /**
     * A list of all subscription definitions.
     *
     * @param list<SubscriptionDefinition|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   description: string,
     *   isActive: bool,
     *   isDefault: bool,
     *   isInternal: bool,
     *   name: string,
     *   updatedAt: \DateTimeInterface,
     *   businessUnitID?: int|null,
     *   communicationMethod?: string|null,
     *   purpose?: string|null,
     * }> $subscriptionDefinitions
     */
    public function withSubscriptionDefinitions(
        array $subscriptionDefinitions
    ): self {
        $self = clone $this;
        $self['subscriptionDefinitions'] = $subscriptionDefinitions;

        return $self;
    }
}
