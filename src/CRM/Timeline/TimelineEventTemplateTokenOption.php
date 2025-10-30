<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Timeline;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $label;

    #[Api]
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
        $obj = new self;

        $obj->label = $label;
        $obj->value = $value;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
