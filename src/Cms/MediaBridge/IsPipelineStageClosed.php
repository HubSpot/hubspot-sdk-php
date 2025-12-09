<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IsPipelineStageClosed\Operator;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type IsPipelineStageClosedShape = array{
 *   operator: value-of<Operator>,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class IsPipelineStageClosed implements BaseModel
{
    /** @use SdkModel<IsPipelineStageClosedShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?bool $value;

    /**
     * `new IsPipelineStageClosed()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IsPipelineStageClosed::with(operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IsPipelineStageClosed)->withOperator(...)
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
     * @param list<array<string,mixed>> $inputs
     */
    public static function with(
        Operator|string $operator = 'IS_PIPELINE_STAGE_CLOSED',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
    ): self {
        $obj = new self;

        $obj['operator'] = $operator;

        null !== $inputs && $obj['inputs'] = $inputs;
        null !== $propertyName && $obj['propertyName'] = $propertyName;
        null !== $value && $obj['value'] = $value;

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

    /**
     * @param list<array<string,mixed>> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj['propertyName'] = $propertyName;

        return $obj;
    }

    public function withValue(bool $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
