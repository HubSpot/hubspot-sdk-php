<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\SetStatusSuccessReason;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\Status;

/**
 * @phpstan-type PublicBulkOptOutFromAllResponseShape = array{
 *   subscriberIdString: string, statuses?: list<PublicStatus>|null
 * }
 */
final class PublicBulkOptOutFromAllResponse implements BaseModel
{
    /** @use SdkModel<PublicBulkOptOutFromAllResponseShape> */
    use SdkModel;

    /**
     * The email address of the contact.
     */
    #[Required]
    public string $subscriberIdString;

    /**
     * An array of subscription status objects for the contact.
     *
     * @var list<PublicStatus>|null $statuses
     */
    #[Optional(list: PublicStatus::class)]
    public ?array $statuses;

    /**
     * `new PublicBulkOptOutFromAllResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBulkOptOutFromAllResponse::with(subscriberIdString: ...)
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
        string $subscriberIdString,
        ?array $statuses = null
    ): self {
        $obj = new self;

        $obj['subscriberIdString'] = $subscriberIdString;

        null !== $statuses && $obj['statuses'] = $statuses;

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
}
