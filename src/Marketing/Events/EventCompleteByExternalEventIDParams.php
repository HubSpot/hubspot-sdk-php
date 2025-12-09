<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Mark a marketing event as completed.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::completeByExternalEventID()
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

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Required]
    public string $externalAccountID;

    #[Required]
    public \DateTimeInterface $endDateTime;

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
        $obj = new self;

        $obj['externalAccountID'] = $externalAccountID;
        $obj['endDateTime'] = $endDateTime;
        $obj['startDateTime'] = $startDateTime;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountID'] = $externalAccountID;

        return $obj;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj['endDateTime'] = $endDateTime;

        return $obj;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj['startDateTime'] = $startDateTime;

        return $obj;
    }
}
