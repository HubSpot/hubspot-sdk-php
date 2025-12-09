<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicEmailSubscriptionFilter\FilterType;

/**
 * @phpstan-type PublicEmailSubscriptionFilterShape = array{
 *   acceptedStatuses: list<string>,
 *   filterType: value-of<FilterType>,
 *   subscriptionIds: list<string>,
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

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /** @var list<string> $subscriptionIds */
    #[Required(list: 'string')]
    public array $subscriptionIds;

    #[Optional]
    public ?string $subscriptionType;

    /**
     * `new PublicEmailSubscriptionFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmailSubscriptionFilter::with(
     *   acceptedStatuses: ..., filterType: ..., subscriptionIds: ...
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
     * @param list<string> $subscriptionIds
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        array $acceptedStatuses,
        array $subscriptionIds,
        FilterType|string $filterType = 'EMAIL_SUBSCRIPTION',
        ?string $subscriptionType = null,
    ): self {
        $obj = new self;

        $obj['acceptedStatuses'] = $acceptedStatuses;
        $obj['filterType'] = $filterType;
        $obj['subscriptionIds'] = $subscriptionIds;

        null !== $subscriptionType && $obj['subscriptionType'] = $subscriptionType;

        return $obj;
    }

    /**
     * @param list<string> $acceptedStatuses
     */
    public function withAcceptedStatuses(array $acceptedStatuses): self
    {
        $obj = clone $this;
        $obj['acceptedStatuses'] = $acceptedStatuses;

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
        $obj['subscriptionIds'] = $subscriptionIDs;

        return $obj;
    }

    public function withSubscriptionType(string $subscriptionType): self
    {
        $obj = clone $this;
        $obj['subscriptionType'] = $subscriptionType;

        return $obj;
    }
}
