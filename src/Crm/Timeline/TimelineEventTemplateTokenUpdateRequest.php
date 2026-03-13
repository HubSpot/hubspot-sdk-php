<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * State of the token definition for update requests.
 *
 * @phpstan-import-type TimelineEventTemplateTokenOptionShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption
 *
 * @phpstan-type TimelineEventTemplateTokenUpdateRequestShape = array{
 *   label: string,
 *   objectPropertyName?: string|null,
 *   options?: list<TimelineEventTemplateTokenOption|TimelineEventTemplateTokenOptionShape>|null,
 * }
 */
final class TimelineEventTemplateTokenUpdateRequest implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateTokenUpdateRequestShape> */
    use SdkModel;

    /**
     * Used for list segmentation and reporting.
     */
    #[Required]
    public string $label;

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    #[Optional]
    public ?string $objectPropertyName;

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @var list<TimelineEventTemplateTokenOption>|null $options
     */
    #[Optional(list: TimelineEventTemplateTokenOption::class)]
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
     * @param list<TimelineEventTemplateTokenOption|TimelineEventTemplateTokenOptionShape>|null $options
     */
    public static function with(
        string $label,
        ?string $objectPropertyName = null,
        ?array $options = null
    ): self {
        $self = new self;

        $self['label'] = $label;

        null !== $objectPropertyName && $self['objectPropertyName'] = $objectPropertyName;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    /**
     * Used for list segmentation and reporting.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    public function withObjectPropertyName(string $objectPropertyName): self
    {
        $self = clone $this;
        $self['objectPropertyName'] = $objectPropertyName;

        return $self;
    }

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @param list<TimelineEventTemplateTokenOption|TimelineEventTemplateTokenOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
