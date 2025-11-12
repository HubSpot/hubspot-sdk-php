<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountUpdateRequestShape = array{
 *   authorized?: bool|null, name?: string|null
 * }
 */
final class PublicChannelAccountUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountUpdateRequestShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $authorized;

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
    public static function with(
        ?bool $authorized = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $authorized && $obj->authorized = $authorized;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj->authorized = $authorized;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
