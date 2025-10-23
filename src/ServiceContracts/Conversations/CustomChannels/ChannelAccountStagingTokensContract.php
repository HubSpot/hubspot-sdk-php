<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ChannelAccountStagingTokensContract
{
    /**
     * @api
     *
     * @param string $channelID
     * @param string $accountName
     * @param PublicDeliveryIdentifier $deliveryIdentifier
     *
     * @throws APIException
     */
    public function update(
        string $accountToken,
        $channelID,
        $accountName,
        $deliveryIdentifier,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccountStagingToken;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $accountToken,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccountStagingToken;
}
