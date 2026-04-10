<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\PublicChannelIntegrationMessageUpdateRequest\StatusType;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelIntegrationMessageUpdateRequestShape = array{
 *   statusType: StatusType|value-of<StatusType>, errorMessage?: string|null
 * }
 */
final class PublicChannelIntegrationMessageUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicChannelIntegrationMessageUpdateRequestShape> */
    use SdkModel;

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
        $self = new self;

        $self['statusType'] = $statusType;

        null !== $errorMessage && $self['errorMessage'] = $errorMessage;

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
