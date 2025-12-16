<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicCommunicationSubscriptionFilter\FilterType;

/**
 * @phpstan-type PublicCommunicationSubscriptionFilterShape = array{
 *   acceptedOptStates: list<string>,
 *   channel: string,
 *   filterType: FilterType|value-of<FilterType>,
 *   subscriptionIDs: list<string>,
 *   subscriptionType: string,
 *   businessUnitID?: string|null,
 * }
 */
final class PublicCommunicationSubscriptionFilter implements BaseModel
{
    /** @use SdkModel<PublicCommunicationSubscriptionFilterShape> */
    use SdkModel;

    /** @var list<string> $acceptedOptStates */
    #[Required(list: 'string')]
    public array $acceptedOptStates;

    #[Required]
    public string $channel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /** @var list<string> $subscriptionIDs */
    #[Required('subscriptionIds', list: 'string')]
    public array $subscriptionIDs;

    #[Required]
    public string $subscriptionType;

    #[Optional('businessUnitId')]
    public ?string $businessUnitID;

    /**
     * `new PublicCommunicationSubscriptionFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCommunicationSubscriptionFilter::with(
     *   acceptedOptStates: ...,
     *   channel: ...,
     *   filterType: ...,
     *   subscriptionIDs: ...,
     *   subscriptionType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCommunicationSubscriptionFilter)
     *   ->withAcceptedOptStates(...)
     *   ->withChannel(...)
     *   ->withFilterType(...)
     *   ->withSubscriptionIDs(...)
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
     * @param list<string> $acceptedOptStates
     * @param list<string> $subscriptionIDs
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        array $acceptedOptStates,
        string $channel,
        array $subscriptionIDs,
        string $subscriptionType,
        FilterType|string $filterType = 'COMMUNICATION_SUBSCRIPTION',
        ?string $businessUnitID = null,
    ): self {
        $self = new self;

        $self['acceptedOptStates'] = $acceptedOptStates;
        $self['channel'] = $channel;
        $self['filterType'] = $filterType;
        $self['subscriptionIDs'] = $subscriptionIDs;
        $self['subscriptionType'] = $subscriptionType;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * @param list<string> $acceptedOptStates
     */
    public function withAcceptedOptStates(array $acceptedOptStates): self
    {
        $self = clone $this;
        $self['acceptedOptStates'] = $acceptedOptStates;

        return $self;
    }

    public function withChannel(string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * @param list<string> $subscriptionIDs
     */
    public function withSubscriptionIDs(array $subscriptionIDs): self
    {
        $self = clone $this;
        $self['subscriptionIDs'] = $subscriptionIDs;

        return $self;
    }

    public function withSubscriptionType(string $subscriptionType): self
    {
        $self = clone $this;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }

    public function withBusinessUnitID(string $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
