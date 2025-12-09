<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken\Type;

/**
 * State of the token definition.
 *
 * @phpstan-type TimelineEventTemplateTokenShape = array{
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   createdAt?: \DateTimeInterface|null,
 *   objectPropertyName?: string|null,
 *   options?: list<TimelineEventTemplateTokenOption>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class TimelineEventTemplateToken implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateTokenShape> */
    use SdkModel;

    /**
     * Used for list segmentation and reporting.
     */
    #[Required]
    public string $label;

    /**
     * The name of the token referenced in the templates. This must be unique for the specific template. It may only contain alphanumeric characters, periods, dashes, or underscores (. - _).
     */
    #[Required]
    public string $name;

    /**
     * The data type of the token. You can currently choose from [string, number, date, enumeration].
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The date and time that the Event Template Token was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

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
     * The date and time that the Event Template Token was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new TimelineEventTemplateToken()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventTemplateToken::with(label: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventTemplateToken)->withLabel(...)->withName(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param list<TimelineEventTemplateTokenOption|array{
     *   label: string, value: string
     * }> $options
     */
    public static function with(
        string $label,
        string $name,
        Type|string $type,
        ?\DateTimeInterface $createdAt = null,
        ?string $objectPropertyName = null,
        ?array $options = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['name'] = $name;
        $self['type'] = $type;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $objectPropertyName && $self['objectPropertyName'] = $objectPropertyName;
        null !== $options && $self['options'] = $options;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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
     * The name of the token referenced in the templates. This must be unique for the specific template. It may only contain alphanumeric characters, periods, dashes, or underscores (. - _).
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The data type of the token. You can currently choose from [string, number, date, enumeration].
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The date and time that the Event Template Token was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * @param list<TimelineEventTemplateTokenOption|array{
     *   label: string, value: string
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * The date and time that the Event Template Token was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
