<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\GoalTargets;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PublicAssociationsForObject;
use HubspotSDK\PublicObjectID;

/**
 * Create a goal target with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard goal targets is provided.
 *
 * @see HubspotSDK\Services\Crm\Objects\GoalTargetsService::create()
 *
 * @phpstan-type GoalTargetCreateParamsShape = array{
 *   associations: list<PublicAssociationsForObject|array{
 *     to: PublicObjectID, types: list<AssociationSpec>
 *   }>,
 *   properties: array<string,string>,
 * }
 */
final class GoalTargetCreateParams implements BaseModel
{
    /** @use SdkModel<GoalTargetCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Api(list: PublicAssociationsForObject::class)]
    public array $associations;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var array<string,string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new GoalTargetCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GoalTargetCreateParams::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GoalTargetCreateParams)->withAssociations(...)->withProperties(...)
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
     * @param list<PublicAssociationsForObject|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     * @param array<string,string> $properties
     */
    public static function with(array $associations, array $properties): self
    {
        $obj = new self;

        $obj['associations'] = $associations;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * @param list<PublicAssociationsForObject|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj['associations'] = $associations;

        return $obj;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
