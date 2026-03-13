<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ChannelAccountStagingTokensContract
{
    /**
     * @api
     *
     * @param string $accountToken path param: The unique token identifying the channel account staging token to update
     * @param int $channelID path param: The ID of the channel associated with the staging token being updated
     * @param string $accountName Body param
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $accountToken,
        int $channelID,
        string $accountName,
        PublicDeliveryIdentifier|array $deliveryIdentifier,
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelAccountStagingToken;
}
