<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\DefaultRequirements\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DefaultRequirementsShape = array{
 *   gates: list<string>,
 *   operator: value-of<Operator>,
 *   scopeNames: list<string>,
 *   settings: list<string>,
 * }
 */
final class DefaultRequirements implements BaseModel
{
    /** @use SdkModel<DefaultRequirementsShape> */
    use SdkModel;

    /** @var list<string> $gates */
    #[Api(list: 'string')]
    public array $gates;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    /** @var list<string> $scopeNames */
    #[Api(list: 'string')]
    public array $scopeNames;

    /** @var list<string> $settings */
    #[Api(list: 'string')]
    public array $settings;

    /**
     * `new DefaultRequirements()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefaultRequirements::with(
     *   gates: ..., operator: ..., scopeNames: ..., settings: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefaultRequirements)
     *   ->withGates(...)
     *   ->withOperator(...)
     *   ->withScopeNames(...)
     *   ->withSettings(...)
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
     * @param list<string> $gates
     * @param Operator|value-of<Operator> $operator
     * @param list<string> $scopeNames
     * @param list<string> $settings
     */
    public static function with(
        array $gates,
        Operator|string $operator,
        array $scopeNames,
        array $settings
    ): self {
        $obj = new self;

        $obj->gates = $gates;
        $obj['operator'] = $operator;
        $obj->scopeNames = $scopeNames;
        $obj->settings = $settings;

        return $obj;
    }

    /**
     * @param list<string> $gates
     */
    public function withGates(array $gates): self
    {
        $obj = clone $this;
        $obj->gates = $gates;

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
     * @param list<string> $scopeNames
     */
    public function withScopeNames(array $scopeNames): self
    {
        $obj = clone $this;
        $obj->scopeNames = $scopeNames;

        return $obj;
    }

    /**
     * @param list<string> $settings
     */
    public function withSettings(array $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }
}
