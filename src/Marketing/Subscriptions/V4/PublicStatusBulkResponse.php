<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_status_bulk_response = array{
 *   statuses: list<PublicStatus>, subscriberIDString: string
 * }
 */
final class PublicStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<public_status_bulk_response> */
    use SdkModel;

    /** @var list<PublicStatus> $statuses */
    #[Api(list: PublicStatus::class)]
    public array $statuses;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * `new PublicStatusBulkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicStatusBulkResponse::with(statuses: ..., subscriberIDString: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicStatusBulkResponse)->withStatuses(...)->withSubscriberIDString(...)
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
     * @param list<PublicStatus> $statuses
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
     * @param list<PublicStatus> $statuses
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
