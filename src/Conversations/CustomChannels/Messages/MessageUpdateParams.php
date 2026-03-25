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
 * @see HubspotSDK\Services\Conversations\CustomChannels\MessagesService::update()
 *
 * @phpstan-type MessageUpdateParamsShape = array{
 *   channelID: int,
 *   statusType: StatusType|value-of<StatusType>,
 *   errorMessage?: string|null,
 * }
 */
final class MessageUpdateParams implements BaseModel
{
    /** @use SdkModel<MessageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

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
        int $channelID,
        StatusType|string $statusType,
        ?string $errorMessage = null
    ): self {
        $self = new self;

        $self['channelID'] = $channelID;
        $self['statusType'] = $statusType;

        null !== $errorMessage && $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withChannelID(int $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }

    /**
     * Valid status are SENT, FAILED, and READ.
     *
     * @param StatusType|value-of<StatusType> $statusType
     */
    public function withStatusType(StatusType|string $statusType): self
    {
        $self = clone $this;
        $self['statusType'] = $statusType;

        return $self;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }
}
