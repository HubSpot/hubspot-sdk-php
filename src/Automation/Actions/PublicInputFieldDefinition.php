<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicInputFieldDefinition\SupportedValueType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicFieldTypeDefinitionShape from \HubspotSDK\Automation\Actions\PublicFieldTypeDefinition
 *
 * @phpstan-type PublicInputFieldDefinitionShape = array{
 *   isRequired: bool,
 *   typeDefinition: PublicFieldTypeDefinition|PublicFieldTypeDefinitionShape,
 *   supportedValueTypes?: list<SupportedValueType|value-of<SupportedValueType>>|null,
 * }
 */
final class PublicInputFieldDefinition implements BaseModel
{
    /** @use SdkModel<PublicInputFieldDefinitionShape> */
    use SdkModel;

    /**
     * Indicates whether the input field is mandatory.
     */
    #[Required]
    public bool $isRequired;

    #[Required]
    public PublicFieldTypeDefinition $typeDefinition;

    /** @var list<value-of<SupportedValueType>>|null $supportedValueTypes */
    #[Optional(list: SupportedValueType::class)]
    public ?array $supportedValueTypes;

    /**
     * `new PublicInputFieldDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInputFieldDefinition::with(isRequired: ..., typeDefinition: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicInputFieldDefinition)->withIsRequired(...)->withTypeDefinition(...)
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
     * @param PublicFieldTypeDefinition|PublicFieldTypeDefinitionShape $typeDefinition
     * @param list<SupportedValueType|value-of<SupportedValueType>>|null $supportedValueTypes
     */
    public static function with(
        bool $isRequired,
        PublicFieldTypeDefinition|array $typeDefinition,
        ?array $supportedValueTypes = null,
    ): self {
        $self = new self;

        $self['isRequired'] = $isRequired;
        $self['typeDefinition'] = $typeDefinition;

        null !== $supportedValueTypes && $self['supportedValueTypes'] = $supportedValueTypes;

        return $self;
    }

    /**
     * Indicates whether the input field is mandatory.
     */
    public function withIsRequired(bool $isRequired): self
    {
        $self = clone $this;
        $self['isRequired'] = $isRequired;

        return $self;
    }

    /**
     * @param PublicFieldTypeDefinition|PublicFieldTypeDefinitionShape $typeDefinition
     */
    public function withTypeDefinition(
        PublicFieldTypeDefinition|array $typeDefinition
    ): self {
        $self = clone $this;
        $self['typeDefinition'] = $typeDefinition;

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
