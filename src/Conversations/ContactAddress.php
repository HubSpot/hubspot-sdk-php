<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ContactAddress\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type contact_address = array{
 *   city?: string,
 *   country?: string,
 *   countryCode?: string,
 *   state?: string,
 *   street?: string,
 *   type?: value-of<Type>,
 *   zip?: string,
 * }
 */
final class ContactAddress implements BaseModel
{
    /** @use SdkModel<contact_address> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $city;

    #[Api(optional: true)]
    public ?string $country;

    #[Api(optional: true)]
    public ?string $countryCode;

    #[Api(optional: true)]
    public ?string $state;

    #[Api(optional: true)]
    public ?string $street;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?string $zip;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $city = null,
        ?string $country = null,
        ?string $countryCode = null,
        ?string $state = null,
        ?string $street = null,
        Type|string|null $type = null,
        ?string $zip = null,
    ): self {
        $obj = new self;

        null !== $city && $obj->city = $city;
        null !== $country && $obj->country = $country;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $state && $obj->state = $state;
        null !== $street && $obj->street = $street;
        null !== $type && $obj['type'] = $type;
        null !== $zip && $obj->zip = $zip;

        return $obj;
    }

    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    public function withStreet(string $street): self
    {
        $obj = clone $this;
        $obj->street = $street;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withZip(string $zip): self
    {
        $obj = clone $this;
        $obj->zip = $zip;

        return $obj;
    }
}
