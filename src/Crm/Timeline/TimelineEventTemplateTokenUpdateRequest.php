<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * State of the token definition for update requests.
 *
 * @phpstan-type TimelineEventTemplateTokenUpdateRequestShape = array{
 *   label: string,
 *   objectPropertyName?: string,
 *   options?: list<TimelineEventTemplateTokenOption>,
 * }
 */
final class TimelineEventTemplateTokenUpdateRequest implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateTokenUpdateRequestShape> */
    use SdkModel;

    /**
     * Used for list segmentation and reporting.
     */
    #[Api]
    public string $label;

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    #[Api(optional: true)]
    public ?string $objectPropertyName;

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @var list<TimelineEventTemplateTokenOption>|null $options
     */
    #[Api(list: TimelineEventTemplateTokenOption::class, optional: true)]
    public ?array $options;

    /**
     * `new TimelineEventTemplateTokenUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventTemplateTokenUpdateRequest::with(label: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventTemplateTokenUpdateRequest)->withLabel(...)
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
     * @param list<TimelineEventTemplateTokenOption> $options
     */
    public static function with(
        string $label,
        ?string $objectPropertyName = null,
        ?array $options = null
    ): self {
        $obj = new self;

        $obj->label = $label;

        null !== $objectPropertyName && $obj->objectPropertyName = $objectPropertyName;
        null !== $options && $obj->options = $options;

        return $obj;
    }

    /**
     * Used for list segmentation and reporting.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    public function withObjectPropertyName(string $objectPropertyName): self
    {
        $obj = clone $this;
        $obj->objectPropertyName = $objectPropertyName;

        return $obj;
    }

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @param list<TimelineEventTemplateTokenOption> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }
}
