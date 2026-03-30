<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 *
 * @phpstan-type ExternalBehavioralEventPropertyDefinitionPatchShape = array{
 *   description?: string|null,
 *   label?: string|null,
 *   options?: list<OptionInput|OptionInputShape>|null,
 * }
 */
final class ExternalBehavioralEventPropertyDefinitionPatch implements BaseModel
{
    /** @use SdkModel<ExternalBehavioralEventPropertyDefinitionPatchShape> */
    use SdkModel;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Human readable label for the property. Used in HubSpot UI.
     */
    #[Optional]
    public ?string $label;

    /**
     * A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OptionInput|OptionInputShape>|null $options
     */
    public static function with(
        ?string $description = null,
        ?string $label = null,
        ?array $options = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $label && $self['label'] = $label;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Human readable label for the property. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @param list<OptionInput|OptionInputShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
