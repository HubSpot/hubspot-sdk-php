<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionFunction\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionFunctionShape = array{
 *   functionSource: string, functionType: value-of<FunctionType>, id?: string|null
 * }
 */
final class PublicActionFunction implements BaseModel
{
    /** @use SdkModel<PublicActionFunctionShape> */
    use SdkModel;

    #[Api]
    public string $functionSource;

    /** @var value-of<FunctionType> $functionType */
    #[Api(enum: FunctionType::class)]
    public string $functionType;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * `new PublicActionFunction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionFunction::with(functionSource: ..., functionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionFunction)->withFunctionSource(...)->withFunctionType(...)
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

        $obj['functionSource'] = $functionSource;
        $obj['functionType'] = $functionType;

        null !== $id && $obj['id'] = $id;

        return $obj;
    }

    public function withFunctionSource(string $functionSource): self
    {
        $obj = clone $this;
        $obj['functionSource'] = $functionSource;

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
        $obj['id'] = $id;

        return $obj;
    }
}
