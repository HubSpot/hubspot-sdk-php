<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * @phpstan-type ExternalBehavioralEventPropertyDefinitionPatchShape = array{
 *   description?: string|null,
 *   label?: string|null,
 *   options?: list<OptionInput>|null,
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
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     */
    public static function with(
        ?string $description = null,
        ?string $label = null,
        ?array $options = null
    ): self {
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $label && $obj['label'] = $label;
        null !== $options && $obj['options'] = $options;

        return $obj;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Human readable label for the property. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }
}
