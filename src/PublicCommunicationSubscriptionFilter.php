<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicCommunicationSubscriptionFilter\FilterType;

/**
 * @phpstan-type PublicCommunicationSubscriptionFilterShape = array{
 *   acceptedOptStates: list<string>,
 *   channel: string,
 *   filterType: value-of<FilterType>,
 *   subscriptionIDs: list<string>,
 *   subscriptionType: string,
 *   businessUnitID?: string,
 * }
 */
final class PublicCommunicationSubscriptionFilter implements BaseModel
{
    /** @use SdkModel<PublicCommunicationSubscriptionFilterShape> */
    use SdkModel;

    /** @var list<string> $acceptedOptStates */
    #[Api(list: 'string')]
    public array $acceptedOptStates;

    #[Api]
    public string $channel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    /** @var list<string> $subscriptionIDs */
    #[Api('subscriptionIds', list: 'string')]
    public array $subscriptionIDs;

    #[Api]
    public string $subscriptionType;

    #[Api('businessUnitId', optional: true)]
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
        $obj = new self;

        $obj->acceptedOptStates = $acceptedOptStates;
        $obj->channel = $channel;
        $obj['filterType'] = $filterType;
        $obj->subscriptionIDs = $subscriptionIDs;
        $obj->subscriptionType = $subscriptionType;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    /**
     * @param list<string> $acceptedOptStates
     */
    public function withAcceptedOptStates(array $acceptedOptStates): self
    {
        $obj = clone $this;
        $obj->acceptedOptStates = $acceptedOptStates;

        return $obj;
    }

    public function withChannel(string $channel): self
    {
        $obj = clone $this;
        $obj->channel = $channel;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    /**
     * @param list<string> $subscriptionIDs
     */
    public function withSubscriptionIDs(array $subscriptionIDs): self
    {
        $obj = clone $this;
        $obj->subscriptionIDs = $subscriptionIDs;

        return $obj;
    }

    public function withSubscriptionType(string $subscriptionType): self
    {
        $obj = clone $this;
        $obj->subscriptionType = $subscriptionType;

        return $obj;
    }

    public function withBusinessUnitID(string $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }
}
