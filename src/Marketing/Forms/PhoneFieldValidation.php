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
        $obj = new self;

        $obj['maxAllowedDigits'] = $maxAllowedDigits;
        $obj['minAllowedDigits'] = $minAllowedDigits;

        return $obj;
    }

    public function withMaxAllowedDigits(int $maxAllowedDigits): self
    {
        $obj = clone $this;
        $obj['maxAllowedDigits'] = $maxAllowedDigits;

        return $obj;
    }

    public function withMinAllowedDigits(int $minAllowedDigits): self
    {
        $obj = clone $this;
        $obj['minAllowedDigits'] = $minAllowedDigits;

        return $obj;
    }
}
