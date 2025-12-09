<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Describes how a numeric value should be validated.
 *
 * @phpstan-type NumberFieldValidationShape = array{
 *   maxAllowedDigits: int, minAllowedDigits: int
 * }
 */
final class NumberFieldValidation implements BaseModel
{
    /** @use SdkModel<NumberFieldValidationShape> */
    use SdkModel;

    #[Required]
    public int $maxAllowedDigits;

    #[Required]
    public int $minAllowedDigits;

    /**
     * `new NumberFieldValidation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberFieldValidation::with(maxAllowedDigits: ..., minAllowedDigits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberFieldValidation)
     *   ->withMaxAllowedDigits(...)
     *   ->withMinAllowedDigits(...)
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
     */
    public static function with(
        int $maxAllowedDigits,
        int $minAllowedDigits
    ): self {
        $self = new self;

        $self['maxAllowedDigits'] = $maxAllowedDigits;
        $self['minAllowedDigits'] = $minAllowedDigits;

        return $self;
    }

    public function withMaxAllowedDigits(int $maxAllowedDigits): self
    {
        $self = clone $this;
        $self['maxAllowedDigits'] = $maxAllowedDigits;

        return $self;
    }

    public function withMinAllowedDigits(int $minAllowedDigits): self
    {
        $self = clone $this;
        $self['minAllowedDigits'] = $minAllowedDigits;

        return $self;
    }
}
