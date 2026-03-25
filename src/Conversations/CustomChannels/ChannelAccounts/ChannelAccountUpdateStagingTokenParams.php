<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::updateStagingToken()
 *
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 *
 * @phpstan-type ChannelAccountUpdateStagingTokenParamsShape = array{
 *   channelID: int,
 *   accountName: string,
 *   deliveryIdentifier: PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 * }
 */
final class ChannelAccountUpdateStagingTokenParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountUpdateStagingTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $channelID;

    #[Required]
    public string $accountName;

    #[Required]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new ChannelAccountUpdateStagingTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountUpdateStagingTokenParams::with(
     *   channelID: ..., accountName: ..., deliveryIdentifier: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountUpdateStagingTokenParams)
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
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier
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
