<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationMessageUpdateRequest\StatusType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_channel_integration_message_update_request = array{
 *   statusType: value-of<StatusType>, errorMessage?: string
 * }
 */
final class PublicChannelIntegrationMessageUpdateRequest implements BaseModel
{
    /** @use SdkModel<public_channel_integration_message_update_request> */
    use SdkModel;

    /** @var value-of<StatusType> $statusType */
    #[Api(enum: StatusType::class)]
    public string $statusType;

    #[Api(optional: true)]
    public ?string $errorMessage;

    /**
     * `new PublicChannelIntegrationMessageUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelIntegrationMessageUpdateRequest::with(statusType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelIntegrationMessageUpdateRequest)->withStatusType(...)
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
        StatusType|string $statusType,
        ?string $errorMessage = null
    ): self {
        $obj = new self;

        $obj['statusType'] = $statusType;

        null !== $errorMessage && $obj->errorMessage = $errorMessage;

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
