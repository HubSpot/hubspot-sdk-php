<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\Events\EventsService::completeByExternalEventID()
 *
 * @phpstan-type EventCompleteByExternalEventIDParamsShape = array{
 *   externalAccountID: string,
 *   endDateTime: \DateTimeInterface,
 *   startDateTime: \DateTimeInterface,
 * }
 */
final class EventCompleteByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventCompleteByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    /**
     * The end date and time of the marketing event in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $endDateTime;

    /**
     * The start date and time of the marketing event in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $startDateTime;

    /**
     * `new EventCompleteByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCompleteByExternalEventIDParams::with(
     *   externalAccountID: ..., endDateTime: ..., startDateTime: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCompleteByExternalEventIDParams)
     *   ->withExternalAccountID(...)
     *   ->withEndDateTime(...)
     *   ->withStartDateTime(...)
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
     */
    public static function with(
        string $externalAccountID,
        \DateTimeInterface $endDateTime,
        \DateTimeInterface $startDateTime,
    ): self {
        $self = new self;

        $self['externalAccountID'] = $externalAccountID;
        $self['endDateTime'] = $endDateTime;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    /**
     * The end date and time of the marketing event in ISO 8601 format.
     */
    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    /**
     * The start date and time of the marketing event in ISO 8601 format.
     */
    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
