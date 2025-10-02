<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_subscriptions_public_wide_status_bulk_response = array{
 *   subscriberIDString: string,
 *   wideStatuses: list<MarketingSubscriptionsPublicWideStatus>,
 * }
 */
final class MarketingSubscriptionsPublicWideStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<marketing_subscriptions_public_wide_status_bulk_response> */
    use SdkModel;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    /** @var list<MarketingSubscriptionsPublicWideStatus> $wideStatuses */
    #[Api(list: MarketingSubscriptionsPublicWideStatus::class)]
    public array $wideStatuses;

    /**
     * `new MarketingSubscriptionsPublicWideStatusBulkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsPublicWideStatusBulkResponse::with(
     *   subscriberIDString: ..., wideStatuses: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingSubscriptionsPublicWideStatusBulkResponse)
     *   ->withSubscriberIDString(...)
     *   ->withWideStatuses(...)
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
     * @param list<MarketingSubscriptionsPublicWideStatus> $wideStatuses
     */
    public static function with(
        string $subscriberIDString,
        array $wideStatuses
    ): self {
        $obj = new self;

        $obj->subscriberIDString = $subscriberIDString;
        $obj->wideStatuses = $wideStatuses;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    /**
     * @param list<MarketingSubscriptionsPublicWideStatus> $wideStatuses
     */
    public function withWideStatuses(array $wideStatuses): self
    {
        $obj = clone $this;
        $obj->wideStatuses = $wideStatuses;

        return $obj;
    }
}
