<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\Messages;

use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateStatusParams\StatusType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessageUpdateStatusParams); // set properties as needed
 * $client->conversations.customChannels.messages->updateStatus(...$params->toArray());
 * ```
 * Update a message.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conversations.customChannels.messages->updateStatus(...$params->toArray());`
 *
 * @see HubspotSDK\Conversations\CustomChannels\Messages->updateStatus
 *
 * @phpstan-type message_update_status_params = array{
 *   channelID: string,
 *   statusType: StatusType|value-of<StatusType>,
 *   errorMessage?: string,
 * }
 */
final class MessageUpdateStatusParams implements BaseModel
{
    /** @use SdkModel<message_update_status_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $channelID;

    /** @var value-of<StatusType> $statusType */
    #[Api(enum: StatusType::class)]
    public string $statusType;

    #[Api(optional: true)]
    public ?string $errorMessage;

    /**
     * `new MessageUpdateStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageUpdateStatusParams::with(channelID: ..., statusType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageUpdateStatusParams)->withChannelID(...)->withStatusType(...)
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
     * @param StatusType|value-of<StatusType> $statusType
     */
    public static function with(
        string $channelID,
        StatusType|string $statusType,
        ?string $errorMessage = null,
    ): self {
        $obj = new self;

        $obj->channelID = $channelID;
        $obj['statusType'] = $statusType;

        null !== $errorMessage && $obj->errorMessage = $errorMessage;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj->channelID = $channelID;

        return $obj;
    }

    /**
     * @param StatusType|value-of<StatusType> $statusType
     */
    public function withStatusType(StatusType|string $statusType): self
    {
        $obj = clone $this;
        $obj['statusType'] = $statusType;

        return $obj;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj->errorMessage = $errorMessage;

        return $obj;
    }
}
