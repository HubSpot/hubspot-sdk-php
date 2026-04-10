<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
 *
 * @see HubSpotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::updateStagingToken()
 *
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 *
 * @phpstan-type ChannelAccountUpdateStagingTokenParamsShape = array{
 *   channelID: int,
 *   accountName?: string|null,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 * }
 */
final class ChannelAccountUpdateStagingTokenParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountUpdateStagingTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    #[Optional]
    public ?string $accountName;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new ChannelAccountUpdateStagingTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountUpdateStagingTokenParams::with(channelID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountUpdateStagingTokenParams)->withChannelID(...)
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
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape|null $deliveryIdentifier
     */
    public static function with(
        int $channelID,
        ?string $accountName = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $self = new self;

        $self['channelID'] = $channelID;

        null !== $accountName && $self['accountName'] = $accountName;
        null !== $deliveryIdentifier && $self['deliveryIdentifier'] = $deliveryIdentifier;

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
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
