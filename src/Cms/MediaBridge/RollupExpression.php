<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RollupExpressionShape = array{
 *   associationTypes: list<AssociationSpec>,
 *   rollupOperator: string,
 *   sourceObjectTypeId: string,
 *   sourcePropertyName: string,
 *   conditionalExpression?: array<string,mixed>|null,
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
    #[Api(list: AssociationSpec::class)]
    public array $associationTypes;

    #[Api]
    public string $rollupOperator;

    #[Api]
    public string $sourceObjectTypeId;

    #[Api]
    public string $sourcePropertyName;

    /** @var array<string,mixed>|null $conditionalExpression */
    #[Api(map: 'mixed', optional: true)]
    public ?array $conditionalExpression;

    #[Api(optional: true)]
    public ?string $conditionalFormula;

    #[Api(optional: true)]
    public ?string $emptyRollupValue;

    #[Api(optional: true)]
    public ?string $sourceCompareByPropertyName;

    /**
     * `new RollupExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RollupExpression::with(
     *   associationTypes: ...,
     *   rollupOperator: ...,
     *   sourceObjectTypeId: ...,
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
     * @param list<AssociationSpec> $associationTypes
     * @param array<string,mixed> $conditionalExpression
     */
    public static function with(
        array $associationTypes,
        string $rollupOperator,
        string $sourceObjectTypeId,
        string $sourcePropertyName,
        ?array $conditionalExpression = null,
        ?string $conditionalFormula = null,
        ?string $emptyRollupValue = null,
        ?string $sourceCompareByPropertyName = null,
    ): self {
        $obj = new self;

        $obj->associationTypes = $associationTypes;
        $obj->rollupOperator = $rollupOperator;
        $obj->sourceObjectTypeId = $sourceObjectTypeId;
        $obj->sourcePropertyName = $sourcePropertyName;

        null !== $conditionalExpression && $obj->conditionalExpression = $conditionalExpression;
        null !== $conditionalFormula && $obj->conditionalFormula = $conditionalFormula;
        null !== $emptyRollupValue && $obj->emptyRollupValue = $emptyRollupValue;
        null !== $sourceCompareByPropertyName && $obj->sourceCompareByPropertyName = $sourceCompareByPropertyName;

        return $obj;
    }

    /**
     * @param list<AssociationSpec> $associationTypes
     */
    public function withAssociationTypes(array $associationTypes): self
    {
        $obj = clone $this;
        $obj->associationTypes = $associationTypes;

        return $obj;
    }

    public function withRollupOperator(string $rollupOperator): self
    {
        $obj = clone $this;
        $obj->rollupOperator = $rollupOperator;

        return $obj;
    }

    public function withSourceObjectTypeID(string $sourceObjectTypeID): self
    {
        $obj = clone $this;
        $obj->sourceObjectTypeId = $sourceObjectTypeID;

        return $obj;
    }

    public function withSourcePropertyName(string $sourcePropertyName): self
    {
        $obj = clone $this;
        $obj->sourcePropertyName = $sourcePropertyName;

        return $obj;
    }

    /**
     * @param array<string,mixed> $conditionalExpression
     */
    public function withConditionalExpression(
        array $conditionalExpression
    ): self {
        $obj = clone $this;
        $obj->conditionalExpression = $conditionalExpression;

        return $obj;
    }

    public function withConditionalFormula(string $conditionalFormula): self
    {
        $obj = clone $this;
        $obj->conditionalFormula = $conditionalFormula;

        return $obj;
    }

    public function withEmptyRollupValue(string $emptyRollupValue): self
    {
        $obj = clone $this;
        $obj->emptyRollupValue = $emptyRollupValue;

        return $obj;
    }

    public function withSourceCompareByPropertyName(
        string $sourceCompareByPropertyName
    ): self {
        $obj = clone $this;
        $obj->sourceCompareByPropertyName = $sourceCompareByPropertyName;

        return $obj;
    }
}
