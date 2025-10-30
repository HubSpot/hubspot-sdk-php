<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutputFieldDefinitionShape = array{
 *   typeDefinition: FieldTypeDefinition
 * }
 */
final class OutputFieldDefinition implements BaseModel
{
    /** @use SdkModel<OutputFieldDefinitionShape> */
    use SdkModel;

    #[Api]
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
     */
    public static function with(FieldTypeDefinition $typeDefinition): self
    {
        $obj = new self;

        $obj->typeDefinition = $typeDefinition;

        return $obj;
    }

    public function withTypeDefinition(
        FieldTypeDefinition $typeDefinition
    ): self {
        $obj = clone $this;
        $obj->typeDefinition = $typeDefinition;

        return $obj;
    }
}
