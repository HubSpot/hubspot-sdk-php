<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelAccountStagingTokens\ChannelAccountStagingTokenUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountStagingTokensContract;

final class ChannelAccountStagingTokensService implements ChannelAccountStagingTokensContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
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
    ): PublicChannelAccountStagingToken {
        $params = [
            'channelID' => $channelID,
            'accountName' => $accountName,
            'deliveryIdentifier' => $deliveryIdentifier,
        ];

        return $this->updateRaw($accountToken, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): PublicChannelAccountStagingToken {
        [$parsed, $options] = ChannelAccountStagingTokenUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-account-staging-tokens/%2$s',
                $channelID,
                $accountToken,
            ],
            body: (object) array_diff_key($parsed, ['channelID']),
            options: $options,
            convert: PublicChannelAccountStagingToken::class,
        );
    }
}
