<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicBulkOptOutFromAllResponseShape = array{
 *   subscriberIDString: string, statuses?: list<PublicStatus>
 * }
 */
final class PublicBulkOptOutFromAllResponse implements BaseModel
{
    /** @use SdkModel<PublicBulkOptOutFromAllResponseShape> */
    use SdkModel;

    /**
     * The email address of the contact.
     */
    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * An array of subscription status objects for the contact.
     *
     * @var list<PublicStatus>|null $statuses
     */
    #[Api(list: PublicStatus::class, optional: true)]
    public ?array $statuses;

    /**
     * `new PublicBulkOptOutFromAllResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBulkOptOutFromAllResponse::with(subscriberIDString: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicBulkOptOutFromAllResponse)->withSubscriberIDString(...)
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
        string $subscriberIDString,
        ?array $statuses = null
    ): self {
        $obj = new self;

        $obj->subscriberIDString = $subscriberIDString;

        null !== $statuses && $obj->statuses = $statuses;

        return $obj;
    }

    /**
     * The email address of the contact.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    /**
     * An array of subscription status objects for the contact.
     *
     * @param list<PublicStatus> $statuses
     */
    public function withStatuses(array $statuses): self
    {
        $obj = clone $this;
        $obj->statuses = $statuses;

        return $obj;
    }
}
