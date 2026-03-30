<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::update()
 *
 * @phpstan-type ChannelAccountUpdateParamsShape = array{
 *   channelID: int, authorized?: bool|null, name?: string|null
 * }
 */
final class ChannelAccountUpdateParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    #[Optional]
    public ?bool $authorized;

    #[Optional]
    public ?string $name;

    /**
     * `new ChannelAccountUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountUpdateParams::with(channelID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountUpdateParams)->withChannelID(...)
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
        int $channelID,
        ?bool $authorized = null,
        ?string $name = null
    ): self {
        $self = new self;

        $self['channelID'] = $channelID;

        null !== $authorized && $self['authorized'] = $authorized;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withChannelID(int $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

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
