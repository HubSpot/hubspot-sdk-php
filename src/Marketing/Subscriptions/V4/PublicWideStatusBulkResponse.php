<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicWideStatusBulkResponseShape = array{
 *   subscriberIDString: string, wideStatuses: list<PublicWideStatus>
 * }
 */
final class PublicWideStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<PublicWideStatusBulkResponseShape> */
    use SdkModel;

    /**
     * The contact's email address.
     */
    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * An array containing the wide status results for the operation.
     *
     * @var list<PublicWideStatus> $wideStatuses
     */
    #[Api(list: PublicWideStatus::class)]
    public array $wideStatuses;

    /**
     * `new PublicWideStatusBulkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWideStatusBulkResponse::with(subscriberIDString: ..., wideStatuses: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWideStatusBulkResponse)
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
     * @param list<PublicWideStatus> $wideStatuses
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

    /**
     * The contact's email address.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    /**
     * An array containing the wide status results for the operation.
     *
     * @param list<PublicWideStatus> $wideStatuses
     */
    public function withWideStatuses(array $wideStatuses): self
    {
        $obj = clone $this;
        $obj->wideStatuses = $wideStatuses;

        return $obj;
    }
}
