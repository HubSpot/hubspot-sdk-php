<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * @see HubspotSDK\Services\Events\DefinitionsService::createProperty()
 *
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 *
 * @phpstan-type DefinitionCreatePropertyParamsShape = array{
 *   label: string,
 *   type: string,
 *   description?: string|null,
 *   name?: string|null,
 *   options?: list<OptionInput|OptionInputShape>|null,
 * }
 */
final class DefinitionCreatePropertyParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreatePropertyParamsShape> */
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
     * `new DefinitionCreatePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionCreatePropertyParams::with(label: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionCreatePropertyParams)->withLabel(...)->withType(...)
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
     * @param list<OptionInput|OptionInputShape>|null $options
     */
    public static function with(
        string $label,
        string $type,
        ?string $description = null,
        ?string $name = null,
        ?array $options = null,
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['type'] = $type;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $options && $self['options'] = $options;

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
     * The data type of the property. Can be one of the following: [string, number, enumeration, datetime].
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
     * Internal property name, which must be used when referencing the property from the API.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
