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

    #[Required]
    public string $name;

    /** @var list<PublicOption> $options */
    #[Required(list: PublicOption::class)]
    public array $options;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $description;

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
