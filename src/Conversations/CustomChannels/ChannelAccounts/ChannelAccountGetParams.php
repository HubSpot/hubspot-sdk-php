<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::get()
 *
 * @phpstan-type ChannelAccountGetParamsShape = array{
 *   channelID: int, archived?: bool
 * }
 */
final class ChannelAccountGetParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    /**
     * Filter results to include only archived or non-archived channel accounts.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new ChannelAccountGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountGetParams::with(channelID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountGetParams)->withChannelID(...)
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
    public static function with(int $channelID, ?bool $archived = null): self
    {
        $self = new self;

        $self['channelID'] = $channelID;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    public function withChannelID(int $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }

    /**
     * Filter results to include only archived or non-archived channel accounts.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
