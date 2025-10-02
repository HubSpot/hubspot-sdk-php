<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_subscriptions_public_bulk_opt_out_from_all_response = array{
 *   subscriberIDString: string,
 *   statuses?: list<MarketingSubscriptionsPublicStatus>,
 * }
 */
final class MarketingSubscriptionsPublicBulkOptOutFromAllResponse implements BaseModel
{
    /**
     * @use SdkModel<marketing_subscriptions_public_bulk_opt_out_from_all_response>
     */
    use SdkModel;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    /** @var list<MarketingSubscriptionsPublicStatus>|null $statuses */
    #[Api(list: MarketingSubscriptionsPublicStatus::class, optional: true)]
    public ?array $statuses;

    /**
     * `new MarketingSubscriptionsPublicBulkOptOutFromAllResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsPublicBulkOptOutFromAllResponse::with(
     *   subscriberIDString: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingSubscriptionsPublicBulkOptOutFromAllResponse)
     *   ->withSubscriberIDString(...)
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
     * @param list<MarketingSubscriptionsPublicStatus> $statuses
     */
    public static function with(
        string $subscriberIDString,
        ?array $statuses = null
    ): self {
        $obj = new self;

        $obj->subscriberIDString = $subscriberIDString;

        null !== $statuses && $obj->statuses = $statuses;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    /**
     * @param list<MarketingSubscriptionsPublicStatus> $statuses
     */
    public function withStatuses(array $statuses): self
    {
        $obj = clone $this;
        $obj->statuses = $statuses;

        return $obj;
    }
}
