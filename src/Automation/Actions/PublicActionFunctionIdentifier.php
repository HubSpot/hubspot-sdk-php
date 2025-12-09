<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier\FunctionType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionFunctionIdentifierShape = array{
 *   functionType: value-of<FunctionType>, id?: string|null
 * }
 */
final class PublicActionFunctionIdentifier implements BaseModel
{
    /** @use SdkModel<PublicActionFunctionIdentifierShape> */
    use SdkModel;

    /** @var value-of<FunctionType> $functionType */
    #[Required(enum: FunctionType::class)]
    public string $functionType;

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
        $obj = new self;

        $obj['functionType'] = $functionType;

        null !== $id && $obj['id'] = $id;

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
