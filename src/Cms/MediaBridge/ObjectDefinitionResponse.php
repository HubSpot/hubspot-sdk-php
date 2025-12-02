<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectDefinitionResponseShape = array{
 *   objectTypeId: string,
 *   objectTypeName: string,
 *   properties: list<PropertyDefinition>,
 *   propertyGroups: list<GroupView>,
 *   schema?: InboundDBObjectType|null,
 * }
 */
final class ObjectDefinitionResponse implements BaseModel
{
    /** @use SdkModel<ObjectDefinitionResponseShape> */
    use SdkModel;

    #[Api]
    public string $objectTypeId;

    #[Api]
    public string $objectTypeName;

    /** @var list<PropertyDefinition> $properties */
    #[Api(list: PropertyDefinition::class)]
    public array $properties;

    /** @var list<GroupView> $propertyGroups */
    #[Api(list: GroupView::class)]
    public array $propertyGroups;

    #[Api(optional: true)]
    public ?InboundDBObjectType $schema;

    /**
     * `new ObjectDefinitionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectDefinitionResponse::with(
     *   objectTypeId: ..., objectTypeName: ..., properties: ..., propertyGroups: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectDefinitionResponse)
     *   ->withObjectTypeID(...)
     *   ->withObjectTypeName(...)
     *   ->withProperties(...)
     *   ->withPropertyGroups(...)
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
     * @param list<PropertyDefinition> $properties
     * @param list<GroupView> $propertyGroups
     */
    public static function with(
        string $objectTypeId,
        string $objectTypeName,
        array $properties,
        array $propertyGroups,
        ?InboundDBObjectType $schema = null,
    ): self {
        $obj = new self;

        $obj->objectTypeId = $objectTypeId;
        $obj->objectTypeName = $objectTypeName;
        $obj->properties = $properties;
        $obj->propertyGroups = $propertyGroups;

        null !== $schema && $obj->schema = $schema;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    public function withObjectTypeName(string $objectTypeName): self
    {
        $obj = clone $this;
        $obj->objectTypeName = $objectTypeName;

        return $obj;
    }

    /**
     * @param list<PropertyDefinition> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<GroupView> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $obj = clone $this;
        $obj->propertyGroups = $propertyGroups;

        return $obj;
    }

    public function withSchema(InboundDBObjectType $schema): self
    {
        $obj = clone $this;
        $obj->schema = $schema;

        return $obj;
    }
}
