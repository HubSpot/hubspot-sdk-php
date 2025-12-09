<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * Create a new property for an existing event definition.
 *
 * @see HubspotSDK\Services\Events\EventDefinitionsService::createProperty()
 *
 * @phpstan-type EventDefinitionCreatePropertyParamsShape = array{
 *   label: string,
 *   type: string,
 *   description?: string,
 *   name?: string,
 *   options?: list<OptionInput|array{
 *     displayOrder: int,
 *     hidden: bool,
 *     label: string,
 *     value: string,
 *     description?: string|null,
 *   }>,
 * }
 */
final class EventDefinitionCreatePropertyParams implements BaseModel
{
    /** @use SdkModel<EventDefinitionCreatePropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Human readable label for the property. Used in HubSpot UI.
     */
    #[Required]
    public string $label;

    /**
     * The data type of the property. Can be one of the following: [string, number, enumeration, datetime].
     */
    #[Required]
    public string $type;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Internal property name, which must be used when referencing the property from the API.
     */
    #[Optional]
    public ?string $name;

    /**
     * A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    /**
     * `new EventDefinitionCreatePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDefinitionCreatePropertyParams::with(label: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDefinitionCreatePropertyParams)->withLabel(...)->withType(...)
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
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     */
    public static function with(
        string $label,
        string $type,
        ?string $description = null,
        ?string $name = null,
        ?array $options = null,
    ): self {
        $obj = new self;

        $obj['label'] = $label;
        $obj['type'] = $type;

        null !== $description && $obj['description'] = $description;
        null !== $name && $obj['name'] = $name;
        null !== $options && $obj['options'] = $options;

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
     * The data type of the property. Can be one of the following: [string, number, enumeration, datetime].
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
     * Internal property name, which must be used when referencing the property from the API.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
