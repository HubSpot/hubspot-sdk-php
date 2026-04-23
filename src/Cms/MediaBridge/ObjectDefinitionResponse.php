<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PropertyDefinitionShape from \HubSpotSDK\Cms\MediaBridge\PropertyDefinition
 * @phpstan-import-type GroupViewShape from \HubSpotSDK\Cms\MediaBridge\GroupView
 * @phpstan-import-type InboundDBObjectTypeShape from \HubSpotSDK\Cms\MediaBridge\InboundDBObjectType
 *
 * @phpstan-type ObjectDefinitionResponseShape = array{
 *   objectTypeID: string,
 *   objectTypeName: string,
 *   properties: list<PropertyDefinition|PropertyDefinitionShape>,
 *   propertyGroups: list<GroupView|GroupViewShape>,
 *   schema?: null|InboundDBObjectType|InboundDBObjectTypeShape,
 * }
 */
final class ObjectDefinitionResponse implements BaseModel
{
    /** @use SdkModel<ObjectDefinitionResponseShape> */
    use SdkModel;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required]
    public string $objectTypeName;

    /** @var list<PropertyDefinition> $properties */
    #[Required(list: PropertyDefinition::class)]
    public array $properties;

    /** @var list<GroupView> $propertyGroups */
    #[Required(list: GroupView::class)]
    public array $propertyGroups;

    #[Optional]
    public ?InboundDBObjectType $schema;

    /**
     * `new ObjectDefinitionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectDefinitionResponse::with(
     *   objectTypeID: ..., objectTypeName: ..., properties: ..., propertyGroups: ...
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
     * @param list<PropertyDefinition|PropertyDefinitionShape> $properties
     * @param list<GroupView|GroupViewShape> $propertyGroups
     * @param InboundDBObjectType|InboundDBObjectTypeShape|null $schema
     */
    public static function with(
        string $objectTypeID,
        string $objectTypeName,
        array $properties,
        array $propertyGroups,
        InboundDBObjectType|array|null $schema = null,
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['objectTypeName'] = $objectTypeName;
        $self['properties'] = $properties;
        $self['propertyGroups'] = $propertyGroups;

        null !== $schema && $self['schema'] = $schema;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withObjectTypeName(string $objectTypeName): self
    {
        $self = clone $this;
        $self['objectTypeName'] = $objectTypeName;

        return $self;
    }

    /**
     * @param list<PropertyDefinition|PropertyDefinitionShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<GroupView|GroupViewShape> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $self = clone $this;
        $self['propertyGroups'] = $propertyGroups;

        return $self;
    }

    /**
     * @param InboundDBObjectType|InboundDBObjectTypeShape $schema
     */
    public function withSchema(InboundDBObjectType|array $schema): self
    {
        $self = clone $this;
        $self['schema'] = $schema;

        return $self;
    }
}
