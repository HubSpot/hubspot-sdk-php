<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountStagingTokensContract;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ChannelAccountStagingTokensService implements ChannelAccountStagingTokensContract
{
    /**
     * @api
     */
    public ChannelAccountStagingTokensRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelAccountStagingTokensRawService($client);
    }

    /**
     * @api
     *
     * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
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
    ): PublicChannelAccountStagingToken {
        $params = Util::removeNulls(
            [
                'channelID' => $channelID,
                'accountName' => $accountName,
                'deliveryIdentifier' => $deliveryIdentifier,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($accountToken, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
