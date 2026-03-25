<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationMessageUpdateRequest\StatusType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
