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
     * @param array{
     *   channelId: int,
     *   accountName: string,
     *   deliveryIdentifier: array{
     *     type: string, value: string
     *   }|PublicDeliveryIdentifier,
     * }|ChannelAccountStagingTokenUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $accountToken,
        array|ChannelAccountStagingTokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccountStagingToken {
        [$parsed, $options] = ChannelAccountStagingTokenUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelId'];
        unset($parsed['channelId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-account-staging-tokens/%2$s',
                $channelID,
                $accountToken,
            ],
            body: (object) array_diff_key($parsed, ['channelId']),
            options: $options,
            convert: PublicChannelAccountStagingToken::class,
        );
    }
}
