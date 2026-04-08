<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\AppLifecycleEventSubscriptionUpsertRequest\SubscriptionType;

/**
 * @phpstan-type AppLifecycleEventSubscriptionUpsertRequestShape = array{
 *   eventTypeID: string,
 *   properties: list<string>,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 * }
 */
final class AppLifecycleEventSubscriptionUpsertRequest implements BaseModel
{
    /** @use SdkModel<AppLifecycleEventSubscriptionUpsertRequestShape> */
    use SdkModel;

    #[Required('eventTypeId')]
    public string $eventTypeID;

    /** @var list<string> $properties */
    #[Required(list: 'string')]
    public array $properties;

    /** @var value-of<SubscriptionType> $subscriptionType */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /**
     * `new AppLifecycleEventSubscriptionUpsertRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppLifecycleEventSubscriptionUpsertRequest::with(
     *   eventTypeID: ..., properties: ..., subscriptionType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppLifecycleEventSubscriptionUpsertRequest)
     *   ->withEventTypeID(...)
     *   ->withProperties(...)
     *   ->withSubscriptionType(...)
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
     * @param list<string> $properties
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public static function with(
        string $eventTypeID,
        array $properties,
        SubscriptionType|string $subscriptionType = 'APP_LIFECYCLE_EVENT',
    ): self {
        $self = new self;

        $self['eventTypeID'] = $eventTypeID;
        $self['properties'] = $properties;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public function withSubscriptionType(
        SubscriptionType|string $subscriptionType
    ): self {
        $self = clone $this;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }
}
