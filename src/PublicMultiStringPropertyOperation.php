<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicMultiStringPropertyOperation\OperationType;

/**
 * @phpstan-type PublicMultiStringPropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   values: list<string>,
 * }
 */
final class PublicMultiStringPropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicMultiStringPropertyOperationShape> */
    use SdkModel;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    #[Required]
    public string $operator;

    /** @var list<string> $values */
    #[Required(list: 'string')]
    public array $values;

    /**
     * `new PublicMultiStringPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMultiStringPropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   values: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMultiStringPropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withValues(...)
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
     * @param list<string> $values
     * @param OperationType|value-of<OperationType> $operationType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operator,
        array $values,
        OperationType|string $operationType = 'MULTISTRING',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['values'] = $values;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
