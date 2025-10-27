<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_channel = array{id?: string, name?: string}
 */
final class PublicChannel implements BaseModel
{
    /** @use SdkModel<public_channel> */
    use SdkModel;

    /**
     * The ID of the channel.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The name of the channel.
     */
    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?string $name = null): self
    {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * The ID of the channel.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The name of the channel.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
