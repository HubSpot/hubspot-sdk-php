<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicDateTimePropertyOperation\OperationType;

/**
 * @phpstan-type PublicDateTimePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   requiresTimeZoneConversion: bool,
 *   timestamp: int,
 * }
 */
final class PublicDateTimePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicDateTimePropertyOperationShape> */
    use SdkModel;

    /**
     * Specifies whether objects without a set value should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The type of operation (DATETIME).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied, such as comparison operators (IS_BEFORE, IS_AFTER).
     */
    #[Required]
    public string $operator;

    /**
     * Indicates whether the timestamp requires conversion to a different time zone.
     */
    #[Required]
    public bool $requiresTimeZoneConversion;

    /**
     * The specific point in time used in the operation.
     */
    #[Required]
    public int $timestamp;

    /**
     * `new PublicDateTimePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDateTimePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   requiresTimeZoneConversion: ...,
     *   timestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDateTimePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
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
     * @param OperationType|value-of<OperationType> $operationType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operator,
        bool $requiresTimeZoneConversion,
        int $timestamp,
        OperationType|string $operationType = 'DATETIME',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Specifies whether objects without a set value should be included in the operation.
     */
    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * The type of operation (DATETIME).
     *
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    /**
     * Defines the operation to be applied, such as comparison operators (IS_BEFORE, IS_AFTER).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Indicates whether the timestamp requires conversion to a different time zone.
     */
    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $self = clone $this;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;

        return $self;
    }

    /**
     * The specific point in time used in the operation.
     */
    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
