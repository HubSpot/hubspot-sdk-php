<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalReminderShape = array{
 *   numberOfTimeUnits: int, timeUnit: string
 * }
 */
final class ExternalReminder implements BaseModel
{
    /** @use SdkModel<ExternalReminderShape> */
    use SdkModel;

    #[Required]
    public int $numberOfTimeUnits;

    #[Required]
    public string $timeUnit;

    /**
     * `new ExternalReminder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalReminder::with(numberOfTimeUnits: ..., timeUnit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalReminder)->withNumberOfTimeUnits(...)->withTimeUnit(...)
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
    public static function with(int $numberOfTimeUnits, string $timeUnit): self
    {
        $self = new self;

        $self['numberOfTimeUnits'] = $numberOfTimeUnits;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    public function withNumberOfTimeUnits(int $numberOfTimeUnits): self
    {
        $self = clone $this;
        $self['numberOfTimeUnits'] = $numberOfTimeUnits;

        return $self;
    }

    public function withTimeUnit(string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
