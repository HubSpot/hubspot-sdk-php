<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicStatusShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicStatus
 *
 * @phpstan-type PublicStatusBulkResponseShape = array{
 *   statuses: list<PublicStatusShape>, subscriberIDString: string
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
    #[Required(list: PublicStatus::class)]
    public array $statuses;

    /**
     * The email address of the contact.
     */
    #[Required('subscriberIdString')]
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
     * @param list<PublicStatusShape> $statuses
     */
    public static function with(
        array $statuses,
        string $subscriberIDString
    ): self {
        $self = new self;

        $self['statuses'] = $statuses;
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

    /**
     * The email address of the contact.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }
}
