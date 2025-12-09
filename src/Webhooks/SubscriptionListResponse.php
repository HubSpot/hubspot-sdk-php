<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\SubscriptionResponse\EventType;

/**
 * List of event subscriptions for your app.
 *
 * @phpstan-type SubscriptionListResponseShape = array{
 *   results: list<SubscriptionResponse>
 * }
 */
final class SubscriptionListResponse implements BaseModel
{
    /** @use SdkModel<SubscriptionListResponseShape> */
    use SdkModel;

    /**
     * List of event subscriptions for your app.
     *
     * @var list<SubscriptionResponse> $results
     */
    #[Required(list: SubscriptionResponse::class)]
    public array $results;

    /**
     * `new SubscriptionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionListResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionListResponse)->withResults(...)
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
     * @param list<SubscriptionResponse|array{
     *   id: string,
     *   active: bool,
     *   createdAt: \DateTimeInterface,
     *   eventType: value-of<EventType>,
     *   objectTypeID?: string|null,
     *   propertyName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * List of event subscriptions for your app.
     *
     * @param list<SubscriptionResponse|array{
     *   id: string,
     *   active: bool,
     *   createdAt: \DateTimeInterface,
     *   eventType: value-of<EventType>,
     *   objectTypeID?: string|null,
     *   propertyName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
