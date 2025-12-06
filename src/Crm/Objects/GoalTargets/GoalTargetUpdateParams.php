<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\GoalTargets;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of an Object identified by `{goalTargetId}`or optionally a unique property value as specified by the `idProperty` query param. `{goalTargetId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
 *
 * @see HubspotSDK\Services\Crm\Objects\GoalTargetsService::update()
 *
 * @phpstan-type GoalTargetUpdateParamsShape = array{
 *   properties: array<string,string>, idProperty?: string
 * }
 */
final class GoalTargetUpdateParams implements BaseModel
{
    /** @use SdkModel<GoalTargetUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * The name of a property whose values are unique for this object.
     */
    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new GoalTargetUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GoalTargetUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GoalTargetUpdateParams)->withProperties(...)
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
     * @param array<string,string> $properties
     */
    public static function with(
        array $properties,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj['properties'] = $properties;

        null !== $idProperty && $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * Key value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The name of a property whose values are unique for this object.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }
}
