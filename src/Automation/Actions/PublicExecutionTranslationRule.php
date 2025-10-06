<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_execution_translation_rule = array{
 *   conditions: array<string, mixed>, labelName: string
 * }
 */
final class PublicExecutionTranslationRule implements BaseModel
{
    /** @use SdkModel<public_execution_translation_rule> */
    use SdkModel;

    /** @var array<string, mixed> $conditions */
    #[Api(map: 'mixed')]
    public array $conditions;

    #[Api]
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
     * @param array<string, mixed> $conditions
     */
    public static function with(array $conditions, string $labelName): self
    {
        $obj = new self;

        $obj->conditions = $conditions;
        $obj->labelName = $labelName;

        return $obj;
    }

    /**
     * @param array<string, mixed> $conditions
     */
    public function withConditions(array $conditions): self
    {
        $obj = clone $this;
        $obj->conditions = $conditions;

        return $obj;
    }

    public function withLabelName(string $labelName): self
    {
        $obj = clone $this;
        $obj->labelName = $labelName;

        return $obj;
    }
}
