<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeDefinitionShape = array{
 *   objectTypeId: string, pluralLabel: string, singularLabel: string
 * }
 */
final class ObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<ObjectTypeDefinitionShape> */
    use SdkModel;

    /**
     * The unique identifier for the object type.
     */
    #[Api]
    public string $objectTypeId;

    /**
     * The plural form label for the object type.
     */
    #[Api]
    public string $pluralLabel;

    /**
     * The singular form label for the object type.
     */
    #[Api]
    public string $singularLabel;

    /**
     * `new ObjectTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeDefinition::with(
     *   objectTypeId: ..., pluralLabel: ..., singularLabel: ...
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
        string $objectTypeId,
        string $pluralLabel,
        string $singularLabel
    ): self {
        $obj = new self;

        $obj['objectTypeId'] = $objectTypeId;
        $obj['pluralLabel'] = $pluralLabel;
        $obj['singularLabel'] = $singularLabel;

        return $obj;
    }

    /**
     * The unique identifier for the object type.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    /**
     * The plural form label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj['pluralLabel'] = $pluralLabel;

        return $obj;
    }

    /**
     * The singular form label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj['singularLabel'] = $singularLabel;

        return $obj;
    }
}
