<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\FieldTypeDefinition\FieldType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\ReferencedObjectType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * @phpstan-type field_type_definition = array{
 *   externalOptions: bool,
 *   name: string,
 *   options: list<Option>,
 *   type: value-of<Type>,
 *   description?: string,
 *   externalOptionsReferenceType?: string,
 *   fieldType?: value-of<FieldType>,
 *   helpText?: string,
 *   label?: string,
 *   optionsURL?: string,
 *   referencedObjectType?: value-of<ReferencedObjectType>,
 * }
 */
final class FieldTypeDefinition implements BaseModel
{
    /** @use SdkModel<field_type_definition> */
    use SdkModel;

    #[Api]
    public bool $externalOptions;

    #[Api]
    public string $name;

    /** @var list<Option> $options */
    #[Api(list: Option::class)]
    public array $options;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $externalOptionsReferenceType;

    /** @var value-of<FieldType>|null $fieldType */
    #[Api(enum: FieldType::class, optional: true)]
    public ?string $fieldType;

    #[Api(optional: true)]
    public ?string $helpText;

    #[Api(optional: true)]
    public ?string $label;

    #[Api('optionsUrl', optional: true)]
    public ?string $optionsURL;

    /** @var value-of<ReferencedObjectType>|null $referencedObjectType */
    #[Api(enum: ReferencedObjectType::class, optional: true)]
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
     * @param list<Option> $options
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
        $obj = new self;

        $obj->externalOptions = $externalOptions;
        $obj->name = $name;
        $obj->options = $options;
        $obj['type'] = $type;

        null !== $description && $obj->description = $description;
        null !== $externalOptionsReferenceType && $obj->externalOptionsReferenceType = $externalOptionsReferenceType;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $helpText && $obj->helpText = $helpText;
        null !== $label && $obj->label = $label;
        null !== $optionsURL && $obj->optionsURL = $optionsURL;
        null !== $referencedObjectType && $obj['referencedObjectType'] = $referencedObjectType;

        return $obj;
    }

    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj->externalOptions = $externalOptions;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<Option> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withExternalOptionsReferenceType(
        string $externalOptionsReferenceType
    ): self {
        $obj = clone $this;
        $obj->externalOptionsReferenceType = $externalOptionsReferenceType;

        return $obj;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withHelpText(string $helpText): self
    {
        $obj = clone $this;
        $obj->helpText = $helpText;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withOptionsURL(string $optionsURL): self
    {
        $obj = clone $this;
        $obj->optionsURL = $optionsURL;

        return $obj;
    }

    /**
     * @param ReferencedObjectType|value-of<ReferencedObjectType> $referencedObjectType
     */
    public function withReferencedObjectType(
        ReferencedObjectType|string $referencedObjectType
    ): self {
        $obj = clone $this;
        $obj['referencedObjectType'] = $referencedObjectType;

        return $obj;
    }
}
