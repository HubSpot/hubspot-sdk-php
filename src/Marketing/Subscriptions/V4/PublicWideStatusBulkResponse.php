<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicWideStatusShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicWideStatus
 *
 * @phpstan-type PublicWideStatusBulkResponseShape = array{
 *   subscriberIDString: string,
 *   wideStatuses: list<PublicWideStatus|PublicWideStatusShape>,
 * }
 */
final class PublicWideStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<PublicWideStatusBulkResponseShape> */
    use SdkModel;

    /**
     * The contact's email address.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * An array containing the wide status results for the operation.
     *
     * @var list<PublicWideStatus> $wideStatuses
     */
    #[Required(list: PublicWideStatus::class)]
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
     * @param list<PublicWideStatus|PublicWideStatusShape> $wideStatuses
     */
    public static function with(
        string $subscriberIDString,
        array $wideStatuses
    ): self {
        $self = new self;

        $self['subscriberIDString'] = $subscriberIDString;
        $self['wideStatuses'] = $wideStatuses;

        return $self;
    }

    /**
     * The contact's email address.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    /**
     * An array containing the wide status results for the operation.
     *
     * @param list<PublicWideStatus|PublicWideStatusShape> $wideStatuses
     */
    public function withWideStatuses(array $wideStatuses): self
    {
        $self = clone $this;
        $self['wideStatuses'] = $wideStatuses;

        return $self;
    }
}
