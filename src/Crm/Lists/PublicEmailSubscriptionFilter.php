<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicEmailSubscriptionFilter\FilterType;

/**
 * @phpstan-type PublicEmailSubscriptionFilterShape = array{
 *   acceptedStatuses: list<string>,
 *   filterType: FilterType|value-of<FilterType>,
 *   subscriptionIDs: list<string>,
 *   subscriptionType?: string|null,
 * }
 */
final class PublicEmailSubscriptionFilter implements BaseModel
{
    /** @use SdkModel<PublicEmailSubscriptionFilterShape> */
    use SdkModel;

    /** @var list<string> $acceptedStatuses */
    #[Required(list: 'string')]
    public array $acceptedStatuses;

    /**
     * Indicates the type of filter (EMAIL_SUBSCRIPTION).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /** @var list<string> $subscriptionIDs */
    #[Required('subscriptionIds', list: 'string')]
    public array $subscriptionIDs;

    /**
     * The type of subscription related to the filter (PORTAL, BRAND, SUBSCRIPTION, HARDBOUNCE, SPAMREPORT).
     */
    #[Optional]
    public ?string $subscriptionType;

    /**
     * `new PublicEmailSubscriptionFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmailSubscriptionFilter::with(
     *   acceptedStatuses: ..., filterType: ..., subscriptionIDs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEmailSubscriptionFilter)
     *   ->withAcceptedStatuses(...)
     *   ->withFilterType(...)
     *   ->withSubscriptionIDs(...)
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
     * @param list<string> $acceptedStatuses
     * @param list<string> $subscriptionIDs
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        array $acceptedStatuses,
        array $subscriptionIDs,
        FilterType|string $filterType = 'EMAIL_SUBSCRIPTION',
        ?string $subscriptionType = null,
    ): self {
        $self = new self;

        $self['acceptedStatuses'] = $acceptedStatuses;
        $self['filterType'] = $filterType;
        $self['subscriptionIDs'] = $subscriptionIDs;

        null !== $subscriptionType && $self['subscriptionType'] = $subscriptionType;

        return $self;
    }

    /**
     * @param list<string> $acceptedStatuses
     */
    public function withAcceptedStatuses(array $acceptedStatuses): self
    {
        $self = clone $this;
        $self['acceptedStatuses'] = $acceptedStatuses;

        return $self;
    }

    /**
     * Indicates the type of filter (EMAIL_SUBSCRIPTION).
     *
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

    /**
     * The type of subscription related to the filter (PORTAL, BRAND, SUBSCRIPTION, HARDBOUNCE, SPAMREPORT).
     */
    public function withSubscriptionType(string $subscriptionType): self
    {
        $self = clone $this;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }
}
