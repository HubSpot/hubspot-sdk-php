<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicTimePointOperation\OperationType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_time_point_operation = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   timePoint: AutomationPublicDatePoint|AutomationPublicIndexedTimePoint|AutomationPublicPropertyReferencedTime,
 *   type: string,
 *   endpointBehavior?: string,
 *   propertyParser?: string,
 * }
 */
final class AutomationPublicTimePointOperation implements BaseModel
{
    /** @use SdkModel<automation_public_time_point_operation> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    #[Api]
    public AutomationPublicDatePoint|AutomationPublicIndexedTimePoint|AutomationPublicPropertyReferencedTime $timePoint;

    #[Api]
    public string $type;

    #[Api(optional: true)]
    public ?string $endpointBehavior;

    #[Api(optional: true)]
    public ?string $propertyParser;

    /**
     * `new AutomationPublicTimePointOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicTimePointOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   timePoint: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicTimePointOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withTimePoint(...)
     *   ->withType(...)
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
        AutomationPublicDatePoint|AutomationPublicIndexedTimePoint|AutomationPublicPropertyReferencedTime $timePoint,
        string $type,
        OperationType|string $operationType = 'TIME_POINT',
        ?string $endpointBehavior = null,
        ?string $propertyParser = null,
    ): self {
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj->operator = $operator;
        $obj->timePoint = $timePoint;
        $obj->type = $type;

        null !== $endpointBehavior && $obj->endpointBehavior = $endpointBehavior;
        null !== $propertyParser && $obj->propertyParser = $propertyParser;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $obj = clone $this;
        $obj['operationType'] = $operationType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withTimePoint(
        AutomationPublicDatePoint|AutomationPublicIndexedTimePoint|AutomationPublicPropertyReferencedTime $timePoint,
    ): self {
        $obj = clone $this;
        $obj->timePoint = $timePoint;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withEndpointBehavior(string $endpointBehavior): self
    {
        $obj = clone $this;
        $obj->endpointBehavior = $endpointBehavior;

        return $obj;
    }

    public function withPropertyParser(string $propertyParser): self
    {
        $obj = clone $this;
        $obj->propertyParser = $propertyParser;

        return $obj;
    }
}
