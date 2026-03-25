<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalBookingFormFieldShape = array{name: string, value: string}
 */
final class ExternalBookingFormField implements BaseModel
{
    /** @use SdkModel<ExternalBookingFormFieldShape> */
    use SdkModel;

    /**
     * The name of the form field.
     */
    #[Required]
    public string $name;

    /**
     * The value associated with the form field.
     */
    #[Required]
    public string $value;

    /**
     * `new ExternalBookingFormField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalBookingFormField::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalBookingFormField)->withName(...)->withValue(...)
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
    public static function with(string $name, string $value): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The name of the form field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value associated with the form field.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
