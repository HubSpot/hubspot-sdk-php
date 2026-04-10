<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FieldTypeDefinitionShape from \HubSpotSDK\Automation\Actions\FieldTypeDefinition
 *
 * @phpstan-type OutputFieldDefinitionShape = array{
 *   typeDefinition: FieldTypeDefinition|FieldTypeDefinitionShape
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
     * @param FieldTypeDefinition|FieldTypeDefinitionShape $typeDefinition
     */
    public static function with(FieldTypeDefinition|array $typeDefinition): self
    {
        $self = new self;

        $self['typeDefinition'] = $typeDefinition;

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
}
