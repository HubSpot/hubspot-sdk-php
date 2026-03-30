<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\FieldTypeDefinition\FieldType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\ReferencedObjectType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\Type;
use HubspotSDK\AutomationActionsOption;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SchemaVariants from \HubspotSDK\Automation\Actions\FieldTypeDefinition\Schema
 * @phpstan-import-type AutomationActionsOptionShape from \HubspotSDK\AutomationActionsOption
 * @phpstan-import-type SchemaShape from \HubspotSDK\Automation\Actions\FieldTypeDefinition\Schema
 *
 * @phpstan-type FieldTypeDefinitionShape = array{
 *   externalOptions: bool,
 *   name: string,
 *   options: list<AutomationActionsOption|AutomationActionsOptionShape>,
 *   schema: SchemaShape,
 *   type: Type|value-of<Type>,
 *   useChirp: bool,
 *   description?: string|null,
 *   externalOptionsReferenceType?: string|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   helpText?: string|null,
 *   label?: string|null,
 *   optionsURL?: string|null,
 *   referencedObjectType?: null|ReferencedObjectType|value-of<ReferencedObjectType>,
 * }
 */
final class FieldTypeDefinition implements BaseModel
{
    /** @use SdkModel<FieldTypeDefinitionShape> */
    use SdkModel;

    /**
     * Indicates whether the field's options are sourced externally.
     */
    #[Required]
    public bool $externalOptions;

    /**
     * The unique identifier for the field.
     */
    #[Required]
    public string $name;

    /** @var list<AutomationActionsOption> $options */
    #[Required(list: AutomationActionsOption::class)]
    public array $options;

    /**
     * Defines the structure and constraints of the field.
     *
     * @var SchemaVariants $schema
     */
    #[Required]
    public IntegerFieldSchema|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema $schema;

    /**
     * Specifies the data type of the field, with accepted values like bool, date, datetime, enumeration, json, number, object_coordinates, phone_number, string.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Specifies whether the field uses the Chirp feature.
     */
    #[Required]
    public bool $useChirp;

    /**
     * A detailed explanation of the field's purpose and usage.
     */
    #[Optional]
    public ?string $description;

    /**
     * Specifies the type of external reference for options.
     */
    #[Optional]
    public ?string $externalOptionsReferenceType;

    /**
     * Describes the field's type in the UI, with accepted values like booleancheckbox, calculation_equation, checkbox, date, file, html, number, phonenumber, radio, select, text, textarea, unknown.
     *
     * @var value-of<FieldType>|null $fieldType
     */
    #[Optional(enum: FieldType::class)]
    public ?string $fieldType;

    /**
     * Additional information or guidance about the field.
     */
    #[Optional]
    public ?string $helpText;

    /**
     * The user-friendly label for the field.
     */
    #[Optional]
    public ?string $label;

    /**
     * A URL that provides options for the field.
     */
    #[Optional('optionsUrl')]
    public ?string $optionsURL;

    /**
     * Indicates the type of object that the field references, with accepted values like OWNER.
     *
     * @var value-of<ReferencedObjectType>|null $referencedObjectType
     */
    #[Optional(enum: ReferencedObjectType::class)]
    public ?string $referencedObjectType;

    /**
     * `new FieldTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FieldTypeDefinition::with(
     *   externalOptions: ...,
     *   name: ...,
     *   options: ...,
     *   schema: ...,
     *   type: ...,
     *   useChirp: ...,
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
     *   ->withSchema(...)
     *   ->withType(...)
     *   ->withUseChirp(...)
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
     * @param list<AutomationActionsOption|AutomationActionsOptionShape> $options
     * @param SchemaShape $schema
     * @param Type|value-of<Type> $type
     * @param FieldType|value-of<FieldType>|null $fieldType
     * @param ReferencedObjectType|value-of<ReferencedObjectType>|null $referencedObjectType
     */
    public static function with(
        bool $externalOptions,
        string $name,
        array $options,
        IntegerFieldSchema|array|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema $schema,
        Type|string $type,
        bool $useChirp,
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
        $self['schema'] = $schema;
        $self['type'] = $type;
        $self['useChirp'] = $useChirp;

        null !== $description && $self['description'] = $description;
        null !== $externalOptionsReferenceType && $self['externalOptionsReferenceType'] = $externalOptionsReferenceType;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $helpText && $self['helpText'] = $helpText;
        null !== $label && $self['label'] = $label;
        null !== $optionsURL && $self['optionsURL'] = $optionsURL;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    /**
     * Indicates whether the field's options are sourced externally.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    /**
     * The unique identifier for the field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<AutomationActionsOption|AutomationActionsOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Defines the structure and constraints of the field.
     *
     * @param SchemaShape $schema
     */
    public function withSchema(
        IntegerFieldSchema|array|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema $schema,
    ): self {
        $self = clone $this;
        $self['schema'] = $schema;

        return $self;
    }

    /**
     * Specifies the data type of the field, with accepted values like bool, date, datetime, enumeration, json, number, object_coordinates, phone_number, string.
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
     * Specifies whether the field uses the Chirp feature.
     */
    public function withUseChirp(bool $useChirp): self
    {
        $self = clone $this;
        $self['useChirp'] = $useChirp;

        return $self;
    }

    /**
     * A detailed explanation of the field's purpose and usage.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Specifies the type of external reference for options.
     */
    public function withExternalOptionsReferenceType(
        string $externalOptionsReferenceType
    ): self {
        $self = clone $this;
        $self['externalOptionsReferenceType'] = $externalOptionsReferenceType;

        return $self;
    }

    /**
     * Describes the field's type in the UI, with accepted values like booleancheckbox, calculation_equation, checkbox, date, file, html, number, phonenumber, radio, select, text, textarea, unknown.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * Additional information or guidance about the field.
     */
    public function withHelpText(string $helpText): self
    {
        $self = clone $this;
        $self['helpText'] = $helpText;

        return $self;
    }

    /**
     * The user-friendly label for the field.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * A URL that provides options for the field.
     */
    public function withOptionsURL(string $optionsURL): self
    {
        $self = clone $this;
        $self['optionsURL'] = $optionsURL;

        return $self;
    }

    /**
     * Indicates the type of object that the field references, with accepted values like OWNER.
     *
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
