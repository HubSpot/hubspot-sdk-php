<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinition;

/**
 * @phpstan-import-type ObjectTypeDefinitionShape from \HubspotSDK\ObjectTypeDefinition
 *
 * @phpstan-type AssociationLabelLimitResponseShape = array{
 *   allLabels: list<string>,
 *   fromObjectType: ObjectTypeDefinition|ObjectTypeDefinitionShape,
 *   limit: int,
 *   percentage: float,
 *   toObjectType: ObjectTypeDefinition|ObjectTypeDefinitionShape,
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

    #[Required]
    public ObjectTypeDefinition $fromObjectType;

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

    #[Required]
    public ObjectTypeDefinition $toObjectType;

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
     * @param ObjectTypeDefinition|ObjectTypeDefinitionShape $fromObjectType
     * @param ObjectTypeDefinition|ObjectTypeDefinitionShape $toObjectType
     */
    public static function with(
        array $allLabels,
        ObjectTypeDefinition|array $fromObjectType,
        int $limit,
        float $percentage,
        ObjectTypeDefinition|array $toObjectType,
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
     * @param ObjectTypeDefinition|ObjectTypeDefinitionShape $fromObjectType
     */
    public function withFromObjectType(
        ObjectTypeDefinition|array $fromObjectType
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
     * @param ObjectTypeDefinition|ObjectTypeDefinitionShape $toObjectType
     */
    public function withToObjectType(
        ObjectTypeDefinition|array $toObjectType
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
