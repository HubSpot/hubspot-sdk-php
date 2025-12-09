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
 *   channelId: int, archived?: bool
 * }
 */
final class ChannelAccountGetParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelId;

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
     * ChannelAccountGetParams::with(channelId: ...)
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
    public static function with(int $channelId, ?bool $archived = null): self
    {
        $obj = new self;

        $obj['channelId'] = $channelId;

        null !== $archived && $obj['archived'] = $archived;

        return $obj;
    }

    public function withChannelID(int $channelID): self
    {
        $obj = clone $this;
        $obj['channelId'] = $channelID;

        return $obj;
    }

    /**
     * Filter results to include only archived or non-archived channel accounts.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }
}
