<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ContactPhone\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactPhoneShape = array{phone: string, type?: value-of<Type>}
 */
final class ContactPhone implements BaseModel
{
    /** @use SdkModel<ContactPhoneShape> */
    use SdkModel;

    #[Api]
    public string $phone;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * `new ContactPhone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactPhone::with(phone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactPhone)->withPhone(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(string $phone, Type|string|null $type = null): self
    {
        $obj = new self;

        $obj->phone = $phone;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    public function withPhone(string $phone): self
    {
        $obj = clone $this;
        $obj->phone = $phone;

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
}
