<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\FieldTypeDefinition\FieldType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\ReferencedObjectType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * @phpstan-type OutputFieldDefinitionShape = array{
 *   typeDefinition: FieldTypeDefinition
 * }
 */
final class OutputFieldDefinition implements BaseModel
{
    /** @use SdkModel<OutputFieldDefinitionShape> */
    use SdkModel;

    #[Required]
    public FieldTypeDefinition $typeDefinition;

    /**
     * `new OutputFieldDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OutputFieldDefinition::with(typeDefinition: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OutputFieldDefinition)->withTypeDefinition(...)
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
     * @param FieldTypeDefinition|array{
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
     * } $typeDefinition
     */
    public static function with(FieldTypeDefinition|array $typeDefinition): self
    {
        $obj = new self;

        $obj['typeDefinition'] = $typeDefinition;

        return $obj;
    }

    /**
     * @param FieldTypeDefinition|array{
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
     * } $typeDefinition
     */
    public function withTypeDefinition(
        FieldTypeDefinition|array $typeDefinition
    ): self {
        $obj = clone $this;
        $obj['typeDefinition'] = $typeDefinition;

        return $obj;
    }
}
