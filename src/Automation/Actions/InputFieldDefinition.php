<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\InputFieldDefinition\SupportedValueType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FieldTypeDefinitionShape from \HubspotSDK\Automation\Actions\FieldTypeDefinition
 *
 * @phpstan-type InputFieldDefinitionShape = array{
 *   isRequired: bool,
 *   typeDefinition: FieldTypeDefinition|FieldTypeDefinitionShape,
 *   automationFieldType?: string|null,
 *   supportedValueTypes?: list<SupportedValueType|value-of<SupportedValueType>>|null,
 * }
 */
final class InputFieldDefinition implements BaseModel
{
    /** @use SdkModel<InputFieldDefinitionShape> */
    use SdkModel;

    #[Required]
    public bool $isRequired;

    #[Required]
    public FieldTypeDefinition $typeDefinition;

    #[Optional]
    public ?string $automationFieldType;

    /** @var list<value-of<SupportedValueType>>|null $supportedValueTypes */
    #[Optional(list: SupportedValueType::class)]
    public ?array $supportedValueTypes;

    /**
     * `new InputFieldDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InputFieldDefinition::with(isRequired: ..., typeDefinition: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InputFieldDefinition)->withIsRequired(...)->withTypeDefinition(...)
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
     * @param FieldTypeDefinition|FieldTypeDefinitionShape $typeDefinition
     * @param list<SupportedValueType|value-of<SupportedValueType>>|null $supportedValueTypes
     */
    public static function with(
        bool $isRequired,
        FieldTypeDefinition|array $typeDefinition,
        ?string $automationFieldType = null,
        ?array $supportedValueTypes = null,
    ): self {
        $self = new self;

        $self['isRequired'] = $isRequired;
        $self['typeDefinition'] = $typeDefinition;

        null !== $automationFieldType && $self['automationFieldType'] = $automationFieldType;
        null !== $supportedValueTypes && $self['supportedValueTypes'] = $supportedValueTypes;

        return $self;
    }

    public function withIsRequired(bool $isRequired): self
    {
        $self = clone $this;
        $self['isRequired'] = $isRequired;

        return $self;
    }

    /**
     * @param FieldTypeDefinition|FieldTypeDefinitionShape $typeDefinition
     */
    public function withTypeDefinition(
        FieldTypeDefinition|array $typeDefinition
    ): self {
        $self = clone $this;
        $self['typeDefinition'] = $typeDefinition;

        return $self;
    }

    public function withAutomationFieldType(string $automationFieldType): self
    {
        $self = clone $this;
        $self['automationFieldType'] = $automationFieldType;

        return $self;
    }

    /**
     * @param list<SupportedValueType|value-of<SupportedValueType>> $supportedValueTypes
     */
    public function withSupportedValueTypes(array $supportedValueTypes): self
    {
        $self = clone $this;
        $self['supportedValueTypes'] = $supportedValueTypes;

        return $self;
    }
}
