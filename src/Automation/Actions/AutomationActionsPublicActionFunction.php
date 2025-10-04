<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\AutomationActionsPublicActionFunction\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type automation_actions_public_action_function = array{
 *   functionSource: string, functionType: value-of<FunctionType>, id?: string
 * }
 */
final class AutomationActionsPublicActionFunction implements BaseModel, ResponseConverter
{
    /** @use SdkModel<automation_actions_public_action_function> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $functionSource;

    /** @var value-of<FunctionType> $functionType */
    #[Api(enum: FunctionType::class)]
    public string $functionType;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * `new AutomationActionsPublicActionFunction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsPublicActionFunction::with(
     *   functionSource: ..., functionType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsPublicActionFunction)
     *   ->withFunctionSource(...)
     *   ->withFunctionType(...)
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
        string $functionSource,
        FunctionType|string $functionType,
        ?string $id = null
    ): self {
        $obj = new self;

        $obj->functionSource = $functionSource;
        $obj['functionType'] = $functionType;

        null !== $id && $obj->id = $id;

        return $obj;
    }

    public function withFunctionSource(string $functionSource): self
    {
        $obj = clone $this;
        $obj->functionSource = $functionSource;

        return $obj;
    }

    /**
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $obj = clone $this;
        $obj['functionType'] = $functionType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
