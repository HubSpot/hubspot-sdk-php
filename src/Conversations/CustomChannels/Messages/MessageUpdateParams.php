<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\Messages;

use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\MessagesService::update()
 *
 * @phpstan-type MessageUpdateParamsShape = array{
 *   channelId: int,
 *   statusType: StatusType|value-of<StatusType>,
 *   errorMessage?: string,
 * }
 */
final class MessageUpdateParams implements BaseModel
{
    /** @use SdkModel<MessageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelId;

    /**
     * Valid status are SENT, FAILED, and READ.
     *
     * @var value-of<StatusType> $statusType
     */
    #[Required(enum: StatusType::class)]
    public string $statusType;

    #[Optional]
    public ?string $errorMessage;

    /**
     * `new MessageUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageUpdateParams::with(channelId: ..., statusType: ...)
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
        int $channelId,
        StatusType|string $statusType,
        ?string $errorMessage = null
    ): self {
        $obj = new self;

        $obj['channelId'] = $channelId;
        $obj['statusType'] = $statusType;

        null !== $errorMessage && $obj['errorMessage'] = $errorMessage;

        return $obj;
    }

    public function withChannelID(int $channelID): self
    {
        $obj = clone $this;
        $obj['channelId'] = $channelID;

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
        $obj['errorMessage'] = $errorMessage;

        return $obj;
    }
}
