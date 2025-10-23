<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\DateTimePropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\DateTimePropertyOperation\PropertyType;

/**
 * @phpstan-type date_time_property_operation = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   requiresTimeZoneConversion: bool,
 *   timestamp: int,
 *   defaultValue?: string,
 * }
 */
final class DateTimePropertyOperation implements BaseModel
{
    /** @use SdkModel<date_time_property_operation> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public string $operatorName;

    /** @var value-of<PropertyType> $propertyType */
    #[Api(enum: PropertyType::class)]
    public string $propertyType;

    #[Api]
    public bool $requiresTimeZoneConversion;

    #[Api]
    public int $timestamp;

    #[Api(optional: true)]
    public ?string $defaultValue;

    /**
     * `new DateTimePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DateTimePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   requiresTimeZoneConversion: ...,
     *   timestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DateTimePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withRequiresTimeZoneConversion(...)
     *   ->withTimestamp(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        bool $requiresTimeZoneConversion,
        int $timestamp,
        PropertyType|string $propertyType = 'datetime',
        ?string $defaultValue = null,
    ): self {
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj->operationType = $operationType;
        $obj['operator'] = $operator;
        $obj->operatorName = $operatorName;
        $obj['propertyType'] = $propertyType;
        $obj->requiresTimeZoneConversion = $requiresTimeZoneConversion;
        $obj->timestamp = $timestamp;

        null !== $defaultValue && $obj->defaultValue = $defaultValue;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withOperationType(string $operationType): self
    {
        $obj = clone $this;
        $obj->operationType = $operationType;

        return $obj;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withOperatorName(string $operatorName): self
    {
        $obj = clone $this;
        $obj->operatorName = $operatorName;

        return $obj;
    }

    /**
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public function withPropertyType(PropertyType|string $propertyType): self
    {
        $obj = clone $this;
        $obj['propertyType'] = $propertyType;

        return $obj;
    }

    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $obj = clone $this;
        $obj->requiresTimeZoneConversion = $requiresTimeZoneConversion;

        return $obj;
    }

    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj->defaultValue = $defaultValue;

        return $obj;
    }
}
