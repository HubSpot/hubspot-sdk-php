<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InboundDBObjectTypeShape from \HubSpotSDK\Cms\MediaBridge\InboundDBObjectType
 * @phpstan-import-type GroupShape from \HubSpotSDK\Cms\MediaBridge\Group
 *
 * @phpstan-type IntegratorObjectCreationResponseShape = array{
 *   objectType: InboundDBObjectType|InboundDBObjectTypeShape,
 *   properties: list<mixed>,
 *   propertyGroups: list<Group|GroupShape>,
 * }
 */
final class IntegratorObjectCreationResponse implements BaseModel
{
    /** @use SdkModel<IntegratorObjectCreationResponseShape> */
    use SdkModel;

    #[Required]
    public InboundDBObjectType $objectType;

    /** @var list<mixed> $properties */
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
     * @param InboundDBObjectType|InboundDBObjectTypeShape $objectType
     * @param list<mixed> $properties
     * @param list<Group|GroupShape> $propertyGroups
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
     * @param InboundDBObjectType|InboundDBObjectTypeShape $objectType
     */
    public function withObjectType(InboundDBObjectType|array $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * @param list<mixed> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<Group|GroupShape> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $self = clone $this;
        $self['propertyGroups'] = $propertyGroups;

        return $self;
    }
}
