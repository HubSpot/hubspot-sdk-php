<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InboundDBObjectTypeShape from \HubspotSDK\Cms\MediaBridge\InboundDBObjectType
 * @phpstan-import-type PropertyDefinitionShape from \HubspotSDK\Cms\MediaBridge\PropertyDefinition
 * @phpstan-import-type GroupShape from \HubspotSDK\Cms\MediaBridge\Group
 *
 * @phpstan-type IntegratorObjectCreationResponseShape = array{
 *   objectType: InboundDBObjectType|InboundDBObjectTypeShape,
 *   properties: list<PropertyDefinitionShape>,
 *   propertyGroups: list<GroupShape>,
 * }
 */
final class IntegratorObjectCreationResponse implements BaseModel
{
    /** @use SdkModel<IntegratorObjectCreationResponseShape> */
    use SdkModel;

    #[Required]
    public InboundDBObjectType $objectType;

    /** @var list<PropertyDefinition> $properties */
    #[Required(list: PropertyDefinition::class)]
    public array $properties;

    /** @var list<Group> $propertyGroups */
    #[Required(list: Group::class)]
    public array $propertyGroups;

    /**
     * `new IntegratorObjectCreationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorObjectCreationResponse::with(
     *   objectType: ..., properties: ..., propertyGroups: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorObjectCreationResponse)
     *   ->withObjectType(...)
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
     * @param InboundDBObjectTypeShape $objectType
     * @param list<PropertyDefinitionShape> $properties
     * @param list<GroupShape> $propertyGroups
     */
    public static function with(
        InboundDBObjectType|array $objectType,
        array $properties,
        array $propertyGroups,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['properties'] = $properties;
        $self['propertyGroups'] = $propertyGroups;

        return $self;
    }

    /**
     * @param InboundDBObjectTypeShape $objectType
     */
    public function withObjectType(InboundDBObjectType|array $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * @param list<PropertyDefinitionShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<GroupShape> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $self = clone $this;
        $self['propertyGroups'] = $propertyGroups;

        return $self;
    }
}
