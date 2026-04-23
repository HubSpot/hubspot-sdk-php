<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\AssociationSpec;
use HubSpotSDK\Cms\MediaBridge\RollupExpression\RollupOperator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AssociationSpecShape from \HubSpotSDK\AssociationSpec
 *
 * @phpstan-type RollupExpressionShape = array{
 *   associationTypes: list<AssociationSpec|AssociationSpecShape>,
 *   rollupOperator: RollupOperator|value-of<RollupOperator>,
 *   sourceObjectTypeID: string,
 *   sourcePropertyName: string,
 *   conditionalExpression?: mixed,
 *   conditionalFormula?: string|null,
 *   emptyRollupValue?: string|null,
 *   sourceCompareByPropertyName?: string|null,
 * }
 */
final class RollupExpression implements BaseModel
{
    /** @use SdkModel<RollupExpressionShape> */
    use SdkModel;

    /** @var list<AssociationSpec> $associationTypes */
    #[Required(list: AssociationSpec::class)]
    public array $associationTypes;

    /** @var value-of<RollupOperator> $rollupOperator */
    #[Required(enum: RollupOperator::class)]
    public string $rollupOperator;

    #[Required('sourceObjectTypeId')]
    public string $sourceObjectTypeID;

    #[Required]
    public string $sourcePropertyName;

    #[Optional]
    public mixed $conditionalExpression;

    #[Optional]
    public ?string $conditionalFormula;

    #[Optional]
    public ?string $emptyRollupValue;

    #[Optional]
    public ?string $sourceCompareByPropertyName;

    /**
     * `new RollupExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RollupExpression::with(
     *   associationTypes: ...,
     *   rollupOperator: ...,
     *   sourceObjectTypeID: ...,
     *   sourcePropertyName: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RollupExpression)
     *   ->withAssociationTypes(...)
     *   ->withRollupOperator(...)
     *   ->withSourceObjectTypeID(...)
     *   ->withSourcePropertyName(...)
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
     * @param list<AssociationSpec|AssociationSpecShape> $associationTypes
     * @param RollupOperator|value-of<RollupOperator> $rollupOperator
     */
    public static function with(
        array $associationTypes,
        RollupOperator|string $rollupOperator,
        string $sourceObjectTypeID,
        string $sourcePropertyName,
        mixed $conditionalExpression = null,
        ?string $conditionalFormula = null,
        ?string $emptyRollupValue = null,
        ?string $sourceCompareByPropertyName = null,
    ): self {
        $self = new self;

        $self['associationTypes'] = $associationTypes;
        $self['rollupOperator'] = $rollupOperator;
        $self['sourceObjectTypeID'] = $sourceObjectTypeID;
        $self['sourcePropertyName'] = $sourcePropertyName;

        null !== $conditionalExpression && $self['conditionalExpression'] = $conditionalExpression;
        null !== $conditionalFormula && $self['conditionalFormula'] = $conditionalFormula;
        null !== $emptyRollupValue && $self['emptyRollupValue'] = $emptyRollupValue;
        null !== $sourceCompareByPropertyName && $self['sourceCompareByPropertyName'] = $sourceCompareByPropertyName;

        return $self;
    }

    /**
     * @param list<AssociationSpec|AssociationSpecShape> $associationTypes
     */
    public function withAssociationTypes(array $associationTypes): self
    {
        $self = clone $this;
        $self['associationTypes'] = $associationTypes;

        return $self;
    }

    /**
     * @param RollupOperator|value-of<RollupOperator> $rollupOperator
     */
    public function withRollupOperator(
        RollupOperator|string $rollupOperator
    ): self {
        $self = clone $this;
        $self['rollupOperator'] = $rollupOperator;

        return $self;
    }

    public function withSourceObjectTypeID(string $sourceObjectTypeID): self
    {
        $self = clone $this;
        $self['sourceObjectTypeID'] = $sourceObjectTypeID;

        return $self;
    }

    public function withSourcePropertyName(string $sourcePropertyName): self
    {
        $self = clone $this;
        $self['sourcePropertyName'] = $sourcePropertyName;

        return $self;
    }

    public function withConditionalExpression(
        mixed $conditionalExpression
    ): self {
        $self = clone $this;
        $self['conditionalExpression'] = $conditionalExpression;

        return $self;
    }

    public function withConditionalFormula(string $conditionalFormula): self
    {
        $self = clone $this;
        $self['conditionalFormula'] = $conditionalFormula;

        return $self;
    }

    public function withEmptyRollupValue(string $emptyRollupValue): self
    {
        $self = clone $this;
        $self['emptyRollupValue'] = $emptyRollupValue;

        return $self;
    }

    public function withSourceCompareByPropertyName(
        string $sourceCompareByPropertyName
    ): self {
        $self = clone $this;
        $self['sourceCompareByPropertyName'] = $sourceCompareByPropertyName;

        return $self;
    }
}
