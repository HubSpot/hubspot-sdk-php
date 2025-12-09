<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Describes how a phone number should be validated.
 *
 * @phpstan-type PhoneFieldValidationShape = array{
 *   maxAllowedDigits: int, minAllowedDigits: int
 * }
 */
final class PhoneFieldValidation implements BaseModel
{
    /** @use SdkModel<PhoneFieldValidationShape> */
    use SdkModel;

    #[Required]
    public int $maxAllowedDigits;

    #[Required]
    public int $minAllowedDigits;

    /**
     * `new PhoneFieldValidation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneFieldValidation::with(maxAllowedDigits: ..., minAllowedDigits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneFieldValidation)->withMaxAllowedDigits(...)->withMinAllowedDigits(...)
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
