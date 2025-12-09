<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TimelineEventTemplateTokenOptionShape = array{
 *   label: string, value: string
 * }
 */
final class TimelineEventTemplateTokenOption implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateTokenOptionShape> */
    use SdkModel;

    #[Required]
    public string $label;

    #[Required]
    public string $value;

    /**
     * `new TimelineEventTemplateTokenOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventTemplateTokenOption::with(label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventTemplateTokenOption)->withLabel(...)->withValue(...)
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
    public static function with(string $label, string $value): self
    {
        $self = new self;

        $self['label'] = $label;
        $self['value'] = $value;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
