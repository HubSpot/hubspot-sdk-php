<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionParams\EventType;

/**
 * Create new event subscription for the specified app.
 *
 * @see HubspotSDK\Services\Webhooks\WebhookSubscriptionsService::createSubscription()
 *
 * @phpstan-type WebhookSubscriptionCreateSubscriptionParamsShape = array{
 *   active: bool,
 *   eventType: EventType|value-of<EventType>,
 *   eventTypeName?: string|null,
 *   objectTypeID?: string|null,
 *   propertyName?: string|null,
 * }
 */
final class WebhookSubscriptionCreateSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookSubscriptionCreateSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Determines if the subscription is active or paused. Defaults to false.
     */
    #[Required]
    public bool $active;

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * The name of the event to listen for. This is used with custom objects to specify custom event types beyond the standard eventType enum values.
     */
    #[Optional]
    public ?string $eventTypeName;

    /**
     * The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     */
    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * `new WebhookSubscriptionCreateSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookSubscriptionCreateSubscriptionParams::with(active: ..., eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookSubscriptionCreateSubscriptionParams)
     *   ->withActive(...)
     *   ->withEventType(...)
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
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(
        bool $active,
        EventType|string $eventType,
        ?string $eventTypeName = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
    ): self {
        $self = new self;

        $self['active'] = $active;
        $self['eventType'] = $eventType;

        null !== $eventTypeName && $self['eventTypeName'] = $eventTypeName;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $propertyName && $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * Determines if the subscription is active or paused. Defaults to false.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * The name of the event to listen for. This is used with custom objects to specify custom event types beyond the standard eventType enum values.
     */
    public function withEventTypeName(string $eventTypeName): self
    {
        $self = clone $this;
        $self['eventTypeName'] = $eventTypeName;

        return $self;
    }

    /**
     * The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }
}
