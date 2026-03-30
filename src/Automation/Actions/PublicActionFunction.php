<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionFunction\FunctionType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionFunctionShape = array{
 *   functionSource: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 *   id?: string|null,
 * }
 */
final class PublicActionFunction implements BaseModel
{
    /** @use SdkModel<PublicActionFunctionShape> */
    use SdkModel;

    /**
     * The source code or script that defines the function's behavior.
     */
    #[Required]
    public string $functionSource;

    /**
     * The type of function, with accepted values: POST_ACTION_EXECUTION, POST_FETCH_OPTIONS, PRE_ACTION_EXECUTION, PRE_FETCH_OPTIONS.
     *
     * @var value-of<FunctionType> $functionType
     */
    #[Required(enum: FunctionType::class)]
    public string $functionType;

    /**
     * The unique identifier for the action function.
     */
    #[Optional]
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
        $self = new self;

        $self['functionSource'] = $functionSource;
        $self['functionType'] = $functionType;

        null !== $id && $self['id'] = $id;

        return $self;
    }

    /**
     * The source code or script that defines the function's behavior.
     */
    public function withFunctionSource(string $functionSource): self
    {
        $self = clone $this;
        $self['functionSource'] = $functionSource;

        return $self;
    }

    /**
     * The type of function, with accepted values: POST_ACTION_EXECUTION, POST_FETCH_OPTIONS, PRE_ACTION_EXECUTION, PRE_FETCH_OPTIONS.
     *
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $self = clone $this;
        $self['functionType'] = $functionType;

        return $self;
    }

    /**
     * The unique identifier for the action function.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
