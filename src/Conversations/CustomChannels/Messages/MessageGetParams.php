<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\Messages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessageGetParams); // set properties as needed
 * $client->conversations.customChannels.messages->get(...$params->toArray());
 * ```
 * Get a message.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conversations.customChannels.messages->get(...$params->toArray());`
 *
 * @see HubspotSDK\Conversations\CustomChannels\Messages->get
 *
 * @phpstan-type message_get_params = array{channelID: string}
 */
final class MessageGetParams implements BaseModel
{
    /** @use SdkModel<message_get_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $channelID;

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
    public static function with(string $channelID): self
    {
        $obj = new self;

        $obj->channelID = $channelID;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj->channelID = $channelID;

        return $obj;
    }
}
