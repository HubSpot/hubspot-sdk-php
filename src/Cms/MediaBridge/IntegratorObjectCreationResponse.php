<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorObjectCreationResponseShape = array{
 *   objectType: InboundDBObjectType,
 *   properties: list<mixed>,
 *   propertyGroups: list<Group>,
 * }
 */
final class IntegratorObjectCreationResponse implements BaseModel
{
    /** @use SdkModel<IntegratorObjectCreationResponseShape> */
    use SdkModel;

    #[Api]
    public InboundDBObjectType $objectType;

    /** @var list<mixed> $properties */
    #[Api(list: PropertyDefinition::class)]
    public array $properties;

    /** @var list<Group> $propertyGroups */
    #[Api(list: Group::class)]
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
     * @param list<mixed> $properties
     * @param list<Group> $propertyGroups
     */
    public static function with(
        InboundDBObjectType $objectType,
        array $properties,
        array $propertyGroups
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->properties = $properties;
        $obj->propertyGroups = $propertyGroups;

        return $obj;
    }

    public function withObjectType(InboundDBObjectType $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    /**
     * @param list<mixed> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<Group> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $obj = clone $this;
        $obj->propertyGroups = $propertyGroups;

        return $obj;
    }
}
