<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\Messages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for a specific message sent over a custom channel.
 *
 * @see HubSpotSDK\Services\Conversations\CustomChannels\MessagesService::get()
 *
 * @phpstan-type MessageGetParamsShape = array{channelID: int}
 */
final class MessageGetParams implements BaseModel
{
    /** @use SdkModel<MessageGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    /**
     * `new MessageGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageGetParams::with(channelID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageGetParams)->withChannelID(...)
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
    public static function with(int $channelID): self
    {
        $self = new self;

        $self['channelID'] = $channelID;

        return $self;
    }

    public function withChannelID(int $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }
}
