<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicExecutionTranslationRuleShape = array{
 *   conditions: array<string,mixed>, labelName: string
 * }
 */
final class PublicExecutionTranslationRule implements BaseModel
{
    /** @use SdkModel<PublicExecutionTranslationRuleShape> */
    use SdkModel;

    /**
     * Defines the conditions that must be met for the execution rule to apply.
     *
     * @var array<string,mixed> $conditions
     */
    #[Required(map: 'mixed')]
    public array $conditions;

    /**
     * Specifies the name of the label associated with the execution rule.
     */
    #[Required]
    public string $labelName;

    /**
     * `new PublicExecutionTranslationRule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicExecutionTranslationRule::with(conditions: ..., labelName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicExecutionTranslationRule)->withConditions(...)->withLabelName(...)
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
     * @param array<string,mixed> $conditions
     */
    public static function with(array $conditions, string $labelName): self
    {
        $self = new self;

        $self['conditions'] = $conditions;
        $self['labelName'] = $labelName;

        return $self;
    }

    /**
     * Defines the conditions that must be met for the execution rule to apply.
     *
     * @param array<string,mixed> $conditions
     */
    public function withConditions(array $conditions): self
    {
        $self = clone $this;
        $self['conditions'] = $conditions;

        return $self;
    }

    /**
     * Specifies the name of the label associated with the execution rule.
     */
    public function withLabelName(string $labelName): self
    {
        $self = clone $this;
        $self['labelName'] = $labelName;

        return $self;
    }
}
