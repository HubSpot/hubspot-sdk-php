<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\Messages;

use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
 *
 * @see HubspotSDK\Conversations\CustomChannels\Messages->update
 *
 * @phpstan-type message_update_params = array{
 *   channelID: string,
 *   statusType: StatusType|value-of<StatusType>,
 *   errorMessage?: string,
 * }
 */
final class MessageUpdateParams implements BaseModel
{
    /** @use SdkModel<message_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $channelID;

    /**
     * Valid status are SENT, FAILED, and READ.
     *
     * @var value-of<StatusType> $statusType
     */
    #[Api(enum: StatusType::class)]
    public string $statusType;

    #[Api(optional: true)]
    public ?string $errorMessage;

    /**
     * `new MessageUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageUpdateParams::with(channelID: ..., statusType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageUpdateParams)->withChannelID(...)->withStatusType(...)
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
     * Valid status are SENT, FAILED, and READ.
     *
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
