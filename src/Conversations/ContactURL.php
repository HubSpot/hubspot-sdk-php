<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ContactURL\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type contact_url = array{url: string, type?: value-of<Type>}
 */
final class ContactURL implements BaseModel
{
    /** @use SdkModel<contact_url> */
    use SdkModel;

    #[Api]
    public string $url;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * `new ContactURL()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactURL::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactURL)->withURL(...)
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
    public static function with(string $url, Type|string|null $type = null): self
    {
        $obj = new self;

        $obj->url = $url;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

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
