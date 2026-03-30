<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicFieldTypeDefinition\FieldType;
use HubspotSDK\Automation\Actions\PublicFieldTypeDefinition\ReferencedObjectType;
use HubspotSDK\Automation\Actions\PublicFieldTypeDefinition\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicOptionShape from \HubspotSDK\Automation\Actions\PublicOption
 *
 * @phpstan-type PublicFieldTypeDefinitionShape = array{
 *   name: string,
 *   options: list<PublicOption|PublicOptionShape>,
 *   type: Type|value-of<Type>,
 *   description?: string|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   helpText?: string|null,
 *   label?: string|null,
 *   optionsURL?: string|null,
 *   referencedObjectType?: null|ReferencedObjectType|value-of<ReferencedObjectType>,
 * }
 */
final class PublicFieldTypeDefinition implements BaseModel
{
    /** @use SdkModel<PublicFieldTypeDefinitionShape> */
    use SdkModel;

    /**
     * The internal name used to identify the field.
     */
    #[Required]
    public string $name;

    /** @var list<PublicOption> $options */
    #[Required(list: PublicOption::class)]
    public array $options;

    /**
     * The data type of the field, with accepted values including bool, date, datetime, enumeration, json, number, object_coordinates, phone_number, and string.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * A detailed explanation of the field's purpose.
     */
    #[Optional]
    public ?string $description;

    /**
     * The type of field, with accepted values including booleancheckbox, calculation_equation, checkbox, date, file, html, number, phonenumber, radio, select, text, and textarea.
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
     * A user-friendly name for the field.
     */
    #[Optional]
    public ?string $label;

    /**
     * A URL that provides options for the field.
     */
    #[Optional('optionsUrl')]
    public ?string $optionsURL;

    /**
     * The type of object that the field references, with accepted values including OWNER.
     *
     * @var value-of<ReferencedObjectType>|null $referencedObjectType
     */
    #[Optional(enum: ReferencedObjectType::class)]
    public ?string $referencedObjectType;

    /**
     * `new PublicFieldTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFieldTypeDefinition::with(name: ..., options: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFieldTypeDefinition)->withName(...)->withOptions(...)->withType(...)
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
     * @param list<PublicOption|PublicOptionShape> $options
     * @param Type|value-of<Type> $type
     * @param FieldType|value-of<FieldType>|null $fieldType
     * @param ReferencedObjectType|value-of<ReferencedObjectType>|null $referencedObjectType
     */
    public static function with(
        string $name,
        array $options,
        Type|string $type,
        ?string $description = null,
        FieldType|string|null $fieldType = null,
        ?string $helpText = null,
        ?string $label = null,
        ?string $optionsURL = null,
        ReferencedObjectType|string|null $referencedObjectType = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        null !== $description && $self['description'] = $description;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $helpText && $self['helpText'] = $helpText;
        null !== $label && $self['label'] = $label;
        null !== $optionsURL && $self['optionsURL'] = $optionsURL;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    /**
     * The internal name used to identify the field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<PublicOption|PublicOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * The data type of the field, with accepted values including bool, date, datetime, enumeration, json, number, object_coordinates, phone_number, and string.
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
     * A detailed explanation of the field's purpose.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The type of field, with accepted values including booleancheckbox, calculation_equation, checkbox, date, file, html, number, phonenumber, radio, select, text, and textarea.
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
     * A user-friendly name for the field.
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
     * The type of object that the field references, with accepted values including OWNER.
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
