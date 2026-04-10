<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\PublicActionFunctionIdentifier\FunctionType;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionFunctionIdentifierShape = array{
 *   functionType: FunctionType|value-of<FunctionType>, id?: string|null
 * }
 */
final class PublicActionFunctionIdentifier implements BaseModel
{
    /** @use SdkModel<PublicActionFunctionIdentifierShape> */
    use SdkModel;

    /**
     * The type of function, with accepted values: POST_ACTION_EXECUTION, POST_FETCH_OPTIONS, PRE_ACTION_EXECUTION, PRE_FETCH_OPTIONS.
     *
     * @var value-of<FunctionType> $functionType
     */
    #[Required(enum: FunctionType::class)]
    public string $functionType;

    /**
     * The unique identifier for the function.
     */
    #[Optional]
    public ?string $id;

    /**
     * `new PublicActionFunctionIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionFunctionIdentifier::with(functionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionFunctionIdentifier)->withFunctionType(...)
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
        $self = new self;

        $self['functionType'] = $functionType;

        null !== $id && $self['id'] = $id;

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
     * The unique identifier for the function.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
