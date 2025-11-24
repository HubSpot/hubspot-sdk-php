<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccountStagingTokens;

use HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountStagingTokensService::update()
 *
 * @phpstan-type ChannelAccountStagingTokenUpdateParamsShape = array{
 *   channelId: int,
 *   accountName: string,
 *   deliveryIdentifier: PublicDeliveryIdentifier,
 * }
 */
final class ChannelAccountStagingTokenUpdateParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountStagingTokenUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $channelId;

    #[Api]
    public string $accountName;

    #[Api]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new ChannelAccountStagingTokenUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountStagingTokenUpdateParams::with(
     *   channelId: ..., accountName: ..., deliveryIdentifier: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountStagingTokenUpdateParams)
     *   ->withChannelID(...)
     *   ->withAccountName(...)
     *   ->withDeliveryIdentifier(...)
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
        int $channelId,
        string $accountName,
        PublicDeliveryIdentifier $deliveryIdentifier,
    ): self {
        $obj = new self;

        $obj->channelId = $channelId;
        $obj->accountName = $accountName;
        $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    public function withChannelID(int $channelID): self
    {
        $obj = clone $this;
        $obj->channelId = $channelID;

        return $obj;
    }

    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj->accountName = $accountName;

        return $obj;
    }

    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }
}
