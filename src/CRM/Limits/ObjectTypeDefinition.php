<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type object_type_definition = array{
 *   objectTypeID: string, pluralLabel: string, singularLabel: string
 * }
 */
final class ObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<object_type_definition> */
    use SdkModel;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $pluralLabel;

    #[Api]
    public string $singularLabel;

    /**
     * `new ObjectTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeDefinition::with(
     *   objectTypeID: ..., pluralLabel: ..., singularLabel: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypeDefinition)
     *   ->withObjectTypeID(...)
     *   ->withPluralLabel(...)
     *   ->withSingularLabel(...)
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
    public static function with(
        string $objectTypeID,
        string $pluralLabel,
        string $singularLabel
    ): self {
        $obj = new self;

        $obj->objectTypeID = $objectTypeID;
        $obj->pluralLabel = $pluralLabel;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj->pluralLabel = $pluralLabel;

        return $obj;
    }

    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }
}
