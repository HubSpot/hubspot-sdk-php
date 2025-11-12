<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelAccountForwardPaging;
use HubspotSDK\Conversations\ConversationsPublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsContract;

final class ChannelAccountsService implements ChannelAccountsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new account for a channel. Multiple accounts can communicate over a single channel using different delivery identifiers.
     *
     * @param array{
     *   authorized: bool,
     *   inboxId: string,
     *   name: string,
     *   deliveryIdentifier?: array{
     *     type: string, value: string
     *   }|PublicDeliveryIdentifier,
     * }|ChannelAccountCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $channelID,
        array|ChannelAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount {
        [$parsed, $options] = ChannelAccountCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts', $channelID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ConversationsPublicChannelAccount::class,
        );
    }

    /**
     * @api
     *
     * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
     *
     * @param array{
     *   channelId: string, authorized?: bool, name?: string
     * }|ChannelAccountUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $channelAccountID,
        array|ChannelAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount {
        [$parsed, $options] = ChannelAccountUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelId'];
        unset($parsed['channelId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            body: (object) array_diff_key($parsed, ['channelId']),
            options: $options,
            convert: ConversationsPublicChannelAccount::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of accounts for a custom channel.
     *
     * @throws APIException
     */
    public function list(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelAccountForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts', $channelID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicChannelAccountForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
     *
     * @param array{channelId: string}|ChannelAccountGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $channelAccountID,
        array|ChannelAccountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount {
        [$parsed, $options] = ChannelAccountGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelId'];
        unset($parsed['channelId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            options: $options,
            convert: ConversationsPublicChannelAccount::class,
        );
    }
}
