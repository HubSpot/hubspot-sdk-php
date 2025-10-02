<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_subscriptions_public_status_bulk_response = array{
 *   statuses: list<MarketingSubscriptionsPublicStatus>, subscriberIDString: string
 * }
 */
final class MarketingSubscriptionsPublicStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<marketing_subscriptions_public_status_bulk_response> */
    use SdkModel;

    /** @var list<MarketingSubscriptionsPublicStatus> $statuses */
    #[Api(list: MarketingSubscriptionsPublicStatus::class)]
    public array $statuses;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * `new MarketingSubscriptionsPublicStatusBulkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsPublicStatusBulkResponse::with(
     *   statuses: ..., subscriberIDString: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingSubscriptionsPublicStatusBulkResponse)
     *   ->withStatuses(...)
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
        array $statuses,
        string $subscriberIDString
    ): self {
        $obj = new self;

        $obj->statuses = $statuses;
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

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }
}
