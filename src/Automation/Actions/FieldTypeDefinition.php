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
 *   optionsUrl?: string|null,
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

    #[Optional]
    public ?string $optionsUrl;

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
        ?string $optionsUrl = null,
        ReferencedObjectType|string|null $referencedObjectType = null,
    ): self {
        $obj = new self;

        $obj['externalOptions'] = $externalOptions;
        $obj['name'] = $name;
        $obj['options'] = $options;
        $obj['type'] = $type;

        null !== $description && $obj['description'] = $description;
        null !== $externalOptionsReferenceType && $obj['externalOptionsReferenceType'] = $externalOptionsReferenceType;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $helpText && $obj['helpText'] = $helpText;
        null !== $label && $obj['label'] = $label;
        null !== $optionsUrl && $obj['optionsUrl'] = $optionsUrl;
        null !== $referencedObjectType && $obj['referencedObjectType'] = $referencedObjectType;

        return $obj;
    }

    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj['externalOptions'] = $externalOptions;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
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
        $obj = clone $this;
        $obj['options'] = $options;

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
        $obj['description'] = $description;

        return $obj;
    }

    public function withExternalOptionsReferenceType(
        string $externalOptionsReferenceType
    ): self {
        $obj = clone $this;
        $obj['externalOptionsReferenceType'] = $externalOptionsReferenceType;

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
        $obj['helpText'] = $helpText;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withOptionsURL(string $optionsURL): self
    {
        $obj = clone $this;
        $obj['optionsUrl'] = $optionsURL;

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
