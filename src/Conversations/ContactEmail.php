<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ContactEmail\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactEmailShape = array{
 *   email: string, type?: value-of<Type>|null
 * }
 */
final class ContactEmail implements BaseModel
{
    /** @use SdkModel<ContactEmailShape> */
    use SdkModel;

    #[Api]
    public string $email;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * `new ContactEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactEmail::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactEmail)->withEmail(...)
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
    public static function with(string $email, Type|string|null $type = null): self
    {
        $obj = new self;

        $obj['email'] = $email;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

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
