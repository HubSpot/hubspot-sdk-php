<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\CustomChannelsService::get()
 *
 * @phpstan-type CustomChannelGetParamsShape = array{
 *   channelID: int, archived?: bool|null
 * }
 */
final class CustomChannelGetParams implements BaseModel
{
    /** @use SdkModel<CustomChannelGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new CustomChannelGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomChannelGetParams::with(channelID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomChannelGetParams)->withChannelID(...)
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
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
