<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\FieldTypeDefinition\FieldType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\ReferencedObjectType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * @phpstan-type FieldTypeDefinitionShape = array{
 *   externalOptions: bool,
 *   name: string,
 *   options: list<Option>,
 *   type: value-of<Type>,
 *   description?: string|null,
 *   externalOptionsReferenceType?: string|null,
 *   fieldType?: value-of<FieldType>|null,
 *   helpText?: string|null,
 *   label?: string|null,
 *   optionsURL?: string|null,
 *   referencedObjectType?: value-of<ReferencedObjectType>|null,
 * }
 */
final class FieldTypeDefinition implements BaseModel
{
    /** @use SdkModel<FieldTypeDefinitionShape> */
    use SdkModel;

    #[Required]
    public bool $externalOptions;

    #[Required]
    public string $name;

    /** @var list<Option> $options */
    #[Required(list: Option::class)]
    public array $options;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $externalOptionsReferenceType;

    /** @var value-of<FieldType>|null $fieldType */
    #[Optional(enum: FieldType::class)]
    public ?string $fieldType;

    #[Optional]
    public ?string $helpText;

    #[Optional]
    public ?string $label;

    #[Optional('optionsUrl')]
    public ?string $optionsURL;

    /** @var value-of<ReferencedObjectType>|null $referencedObjectType */
    #[Optional(enum: ReferencedObjectType::class)]
    public ?string $referencedObjectType;

    /**
     * `new FieldTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FieldTypeDefinition::with(
     *   externalOptions: ..., name: ..., options: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FieldTypeDefinition)
     *   ->withExternalOptions(...)
     *   ->withName(...)
     *   ->withOptions(...)
     *   ->withType(...)
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
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     * @param Type|value-of<Type> $type
     * @param FieldType|value-of<FieldType> $fieldType
     * @param ReferencedObjectType|value-of<ReferencedObjectType> $referencedObjectType
     */
    public static function with(
        bool $externalOptions,
        string $name,
        array $options,
        Type|string $type,
        ?string $description = null,
        ?string $externalOptionsReferenceType = null,
        FieldType|string|null $fieldType = null,
        ?string $helpText = null,
        ?string $label = null,
        ?string $optionsURL = null,
        ReferencedObjectType|string|null $referencedObjectType = null,
    ): self {
        $self = new self;

        $self['externalOptions'] = $externalOptions;
        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        null !== $description && $self['description'] = $description;
        null !== $externalOptionsReferenceType && $self['externalOptionsReferenceType'] = $externalOptionsReferenceType;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $helpText && $self['helpText'] = $helpText;
        null !== $label && $self['label'] = $label;
        null !== $optionsURL && $self['optionsURL'] = $optionsURL;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withExternalOptionsReferenceType(
        string $externalOptionsReferenceType
    ): self {
        $self = clone $this;
        $self['externalOptionsReferenceType'] = $externalOptionsReferenceType;

        return $self;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withHelpText(string $helpText): self
    {
        $self = clone $this;
        $self['helpText'] = $helpText;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withOptionsURL(string $optionsURL): self
    {
        $self = clone $this;
        $self['optionsURL'] = $optionsURL;

        return $self;
    }

    /**
     * @param ReferencedObjectType|value-of<ReferencedObjectType> $referencedObjectType
     */
    public function withReferencedObjectType(
        ReferencedObjectType|string $referencedObjectType
    ): self {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }
}
