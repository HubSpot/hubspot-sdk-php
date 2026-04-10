<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountUpdateRequestShape = array{
 *   authorized?: bool|null, name?: string|null
 * }
 */
final class PublicChannelAccountUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountUpdateRequestShape> */
    use SdkModel;

    #[Optional]
    public ?bool $authorized;

    #[Optional]
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
        $self = new self;

        null !== $authorized && $self['authorized'] = $authorized;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withAuthorized(bool $authorized): self
    {
        $self = clone $this;
        $self['authorized'] = $authorized;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
