<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type phone_field_validation = array{
 *   maxAllowedDigits: int, minAllowedDigits: int
 * }
 */
final class PhoneFieldValidation implements BaseModel
{
    /** @use SdkModel<phone_field_validation> */
    use SdkModel;

    #[Api]
    public int $maxAllowedDigits;

    #[Api]
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

        $obj->maxAllowedDigits = $maxAllowedDigits;
        $obj->minAllowedDigits = $minAllowedDigits;

        return $obj;
    }

    public function withMaxAllowedDigits(int $maxAllowedDigits): self
    {
        $obj = clone $this;
        $obj->maxAllowedDigits = $maxAllowedDigits;

        return $obj;
    }

    public function withMinAllowedDigits(int $minAllowedDigits): self
    {
        $obj = clone $this;
        $obj->minAllowedDigits = $minAllowedDigits;

        return $obj;
    }
}
