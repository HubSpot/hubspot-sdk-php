<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\Calling\FormattedPhoneNumber\PhoneNumberType;

/**
 * @phpstan-type FormattedPhoneNumberShape = array{
 *   e164Number: string,
 *   phoneNumberType: PhoneNumberType|value-of<PhoneNumberType>,
 *   extension?: string|null,
 * }
 */
final class FormattedPhoneNumber implements BaseModel
{
    /** @use SdkModel<FormattedPhoneNumberShape> */
    use SdkModel;

    /**
     * The phone number formatted in E.164 standard.
     */
    #[Required]
    public string $e164Number;

    /**
     * The type of phone number, with accepted values including FIXED_LINE, MOBILE, VOIP, and others.
     *
     * @var value-of<PhoneNumberType> $phoneNumberType
     */
    #[Required(enum: PhoneNumberType::class)]
    public string $phoneNumberType;

    /**
     * The extension number associated with the phone number.
     */
    #[Optional]
    public ?string $extension;

    /**
     * `new FormattedPhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormattedPhoneNumber::with(e164Number: ..., phoneNumberType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormattedPhoneNumber)->withE164Number(...)->withPhoneNumberType(...)
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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        string $e164Number,
        PhoneNumberType|string $phoneNumberType,
        ?string $extension = null,
    ): self {
        $self = new self;

        $self['e164Number'] = $e164Number;
        $self['phoneNumberType'] = $phoneNumberType;

        null !== $extension && $self['extension'] = $extension;

        return $self;
    }

    /**
     * The phone number formatted in E.164 standard.
     */
    public function withE164Number(string $e164Number): self
    {
        $self = clone $this;
        $self['e164Number'] = $e164Number;

        return $self;
    }

    /**
     * The type of phone number, with accepted values including FIXED_LINE, MOBILE, VOIP, and others.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * The extension number associated with the phone number.
     */
    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }
}
