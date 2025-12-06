<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\SetStatusSuccessReason;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\Status;

/**
 * @phpstan-type PublicStatusBulkResponseShape = array{
 *   statuses: list<PublicStatus>, subscriberIdString: string
 * }
 */
final class PublicStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<PublicStatusBulkResponseShape> */
    use SdkModel;

    /**
     * An array of subscription status objects for the contact.
     *
     * @var list<PublicStatus> $statuses
     */
    #[Api(list: PublicStatus::class)]
    public array $statuses;

    /**
     * The email address of the contact.
     */
    #[Api]
    public string $subscriberIdString;

    /**
     * `new PublicStatusBulkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicStatusBulkResponse::with(statuses: ..., subscriberIdString: ...)
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
     * @param list<PublicStatus|array{
     *   channel: value-of<Channel>,
     *   source: string,
     *   status: value-of<Status>,
     *   subscriberIdString: string,
     *   subscriptionId: int,
     *   timestamp: \DateTimeInterface,
     *   businessUnitId?: int|null,
     *   legalBasis?: value-of<LegalBasis>|null,
     *   legalBasisExplanation?: string|null,
     *   setStatusSuccessReason?: value-of<SetStatusSuccessReason>|null,
     *   subscriptionName?: string|null,
     * }> $statuses
     */
    public static function with(
        array $statuses,
        string $subscriberIdString
    ): self {
        $obj = new self;

        $obj['statuses'] = $statuses;
        $obj['subscriberIdString'] = $subscriberIdString;

        return $obj;
    }

    /**
     * An array of subscription status objects for the contact.
     *
     * @param list<PublicStatus|array{
     *   channel: value-of<Channel>,
     *   source: string,
     *   status: value-of<Status>,
     *   subscriberIdString: string,
     *   subscriptionId: int,
     *   timestamp: \DateTimeInterface,
     *   businessUnitId?: int|null,
     *   legalBasis?: value-of<LegalBasis>|null,
     *   legalBasisExplanation?: string|null,
     *   setStatusSuccessReason?: value-of<SetStatusSuccessReason>|null,
     *   subscriptionName?: string|null,
     * }> $statuses
     */
    public function withStatuses(array $statuses): self
    {
        $obj = clone $this;
        $obj['statuses'] = $statuses;

        return $obj;
    }

    /**
     * The email address of the contact.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj['subscriberIdString'] = $subscriberIDString;

        return $obj;
    }
}
