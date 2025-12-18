<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicStatusShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicStatus
 *
 * @phpstan-type PublicBulkOptOutFromAllResponseShape = array{
 *   subscriberIDString: string, statuses?: list<PublicStatusShape>|null
 * }
 */
final class PublicBulkOptOutFromAllResponse implements BaseModel
{
    /** @use SdkModel<PublicBulkOptOutFromAllResponseShape> */
    use SdkModel;

    /**
     * The email address of the contact.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

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
     * @param list<PublicStatusShape>|null $statuses
     */
    public static function with(
        string $subscriberIDString,
        ?array $statuses = null
    ): self {
        $self = new self;

        $self['subscriberIDString'] = $subscriberIDString;

        null !== $statuses && $self['statuses'] = $statuses;

        return $self;
    }

    /**
     * The email address of the contact.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    /**
     * An array of subscription status objects for the contact.
     *
     * @param list<PublicStatusShape> $statuses
     */
    public function withStatuses(array $statuses): self
    {
        $self = clone $this;
        $self['statuses'] = $statuses;

        return $self;
    }
}
