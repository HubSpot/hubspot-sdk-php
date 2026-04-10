<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\DefaultRequirements\Operator;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DefaultRequirementsShape = array{
 *   gates: list<string>,
 *   operator: Operator|value-of<Operator>,
 *   scopeNames: list<string>,
 *   settings: list<string>,
 * }
 */
final class DefaultRequirements implements BaseModel
{
    /** @use SdkModel<DefaultRequirementsShape> */
    use SdkModel;

    /** @var list<string> $gates */
    #[Required(list: 'string')]
    public array $gates;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var list<string> $scopeNames */
    #[Required(list: 'string')]
    public array $scopeNames;

    /** @var list<string> $settings */
    #[Required(list: 'string')]
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
        $self = new self;

        $self['gates'] = $gates;
        $self['operator'] = $operator;
        $self['scopeNames'] = $scopeNames;
        $self['settings'] = $settings;

        return $self;
    }

    /**
     * @param list<string> $gates
     */
    public function withGates(array $gates): self
    {
        $self = clone $this;
        $self['gates'] = $gates;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param list<string> $scopeNames
     */
    public function withScopeNames(array $scopeNames): self
    {
        $self = clone $this;
        $self['scopeNames'] = $scopeNames;

        return $self;
    }

    /**
     * @param list<string> $settings
     */
    public function withSettings(array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
