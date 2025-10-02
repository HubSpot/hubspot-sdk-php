<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\AutomationActionsPublicActionFunctionIdentifier\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_public_action_function_identifier = array{
 *   functionType: value-of<FunctionType>, id?: string
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AutomationActionsPublicActionFunctionIdentifier implements BaseModel
{
    /** @use SdkModel<automation_actions_public_action_function_identifier> */
    use SdkModel;

    /** @var value-of<FunctionType> $functionType */
    #[Api(enum: FunctionType::class)]
    public string $functionType;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * `new AutomationActionsPublicActionFunctionIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsPublicActionFunctionIdentifier::with(functionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsPublicActionFunctionIdentifier)->withFunctionType(...)
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
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public static function with(
        FunctionType|string $functionType,
        ?string $id = null
    ): self {
        $obj = new self;

        $obj->functionType = $functionType instanceof FunctionType ? $functionType->value : $functionType;

        null !== $id && $obj->id = $id;

        return $obj;
    }

    /**
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $obj = clone $this;
        $obj->functionType = $functionType instanceof FunctionType ? $functionType->value : $functionType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
