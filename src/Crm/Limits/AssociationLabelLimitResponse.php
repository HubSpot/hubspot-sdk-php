<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;

/**
 * @phpstan-import-type ObjectsSchemasObjectTypeDefinitionShape from \HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition
 *
 * @phpstan-type AssociationLabelLimitResponseShape = array{
 *   allLabels: list<string>,
 *   fromObjectType: ObjectsSchemasObjectTypeDefinition|ObjectsSchemasObjectTypeDefinitionShape,
 *   limit: int,
 *   percentage: float,
 *   toObjectType: ObjectsSchemasObjectTypeDefinition|ObjectsSchemasObjectTypeDefinitionShape,
 *   usage: int,
 * }
 */
final class AssociationLabelLimitResponse implements BaseModel
{
    /** @use SdkModel<AssociationLabelLimitResponseShape> */
    use SdkModel;

    /**
     * A list of all association labels.
     *
     * @var list<string> $allLabels
     */
    #[Required(list: 'string')]
    public array $allLabels;

    /**
     * Defines an object type.
     */
    #[Required]
    public ObjectsSchemasObjectTypeDefinition $fromObjectType;

    /**
     * The maximum number of association labels allowed.
     */
    #[Required]
    public int $limit;

    /**
     * The percentage of the association label limit that has been used.
     */
    #[Required]
    public float $percentage;

    /**
     * Defines an object type.
     */
    #[Required]
    public ObjectsSchemasObjectTypeDefinition $toObjectType;

    /**
     * The current number of association labels used.
     */
    #[Required]
    public int $usage;

    /**
     * `new AssociationLabelLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationLabelLimitResponse::with(
     *   allLabels: ...,
     *   fromObjectType: ...,
     *   limit: ...,
     *   percentage: ...,
     *   toObjectType: ...,
     *   usage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationLabelLimitResponse)
     *   ->withAllLabels(...)
     *   ->withFromObjectType(...)
     *   ->withLimit(...)
     *   ->withPercentage(...)
     *   ->withToObjectType(...)
     *   ->withUsage(...)
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
     * @param list<string> $allLabels
     * @param ObjectsSchemasObjectTypeDefinitionShape $fromObjectType
     * @param ObjectsSchemasObjectTypeDefinitionShape $toObjectType
     */
    public static function with(
        array $allLabels,
        ObjectsSchemasObjectTypeDefinition|array $fromObjectType,
        int $limit,
        float $percentage,
        ObjectsSchemasObjectTypeDefinition|array $toObjectType,
        int $usage,
    ): self {
        $self = new self;

        $self['allLabels'] = $allLabels;
        $self['fromObjectType'] = $fromObjectType;
        $self['limit'] = $limit;
        $self['percentage'] = $percentage;
        $self['toObjectType'] = $toObjectType;
        $self['usage'] = $usage;

        return $self;
    }

    /**
     * A list of all association labels.
     *
     * @param list<string> $allLabels
     */
    public function withAllLabels(array $allLabels): self
    {
        $self = clone $this;
        $self['allLabels'] = $allLabels;

        return $self;
    }

    /**
     * Defines an object type.
     *
     * @param ObjectsSchemasObjectTypeDefinitionShape $fromObjectType
     */
    public function withFromObjectType(
        ObjectsSchemasObjectTypeDefinition|array $fromObjectType
    ): self {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    /**
     * The maximum number of association labels allowed.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The percentage of the association label limit that has been used.
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * Defines an object type.
     *
     * @param ObjectsSchemasObjectTypeDefinitionShape $toObjectType
     */
    public function withToObjectType(
        ObjectsSchemasObjectTypeDefinition|array $toObjectType
    ): self {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    /**
     * The current number of association labels used.
     */
    public function withUsage(int $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}
