<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
 *
 * @see HubspotSDK\Conversations\CustomChannels\ChannelAccounts->update
 *
 * @phpstan-type ChannelAccountUpdateParamsShape = array{
 *   channelId: string, authorized?: bool, name?: string
 * }
 */
final class ChannelAccountUpdateParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $channelId;

    #[Api(optional: true)]
    public ?bool $authorized;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new ChannelAccountUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountUpdateParams::with(channelId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountUpdateParams)->withChannelID(...)
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
    public static function with(
        string $channelId,
        ?bool $authorized = null,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->channelId = $channelId;

        null !== $authorized && $obj->authorized = $authorized;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj->channelId = $channelID;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj->authorized = $authorized;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
