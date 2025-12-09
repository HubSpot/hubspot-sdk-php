<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccountStagingTokens;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountStagingTokensService::update()
 *
 * @phpstan-type ChannelAccountStagingTokenUpdateParamsShape = array{
 *   channelID: int,
 *   accountName: string,
 *   deliveryIdentifier: PublicDeliveryIdentifier|array{
 *     type: string, value: string
 *   },
 * }
 */
final class ChannelAccountStagingTokenUpdateParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountStagingTokenUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    #[Required]
    public string $accountName;

    #[Required]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new ChannelAccountStagingTokenUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountStagingTokenUpdateParams::with(
     *   channelID: ..., accountName: ..., deliveryIdentifier: ...
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
     *
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public static function with(
        int $channelID,
        string $accountName,
        PublicDeliveryIdentifier|array $deliveryIdentifier,
    ): self {
        $self = new self;

        $self['channelID'] = $channelID;
        $self['accountName'] = $accountName;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }

    public function withChannelID(int $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }

    public function withAccountName(string $accountName): self
    {
        $self = clone $this;
        $self['accountName'] = $accountName;

        return $self;
    }

    /**
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
