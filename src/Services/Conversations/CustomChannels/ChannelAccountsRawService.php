<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsRawContract;

final class ChannelAccountsRawService implements ChannelAccountsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new account for a channel. Multiple accounts can communicate over a single channel using different delivery identifiers.
     *
     * @param int $channelID the ID of the channel for which the account is being created
     * @param array{
     *   authorized: bool,
     *   inboxID: string,
     *   name: string,
     *   deliveryIdentifier?: array{
     *     type: string, value: string
     *   }|PublicDeliveryIdentifier,
     * }|ChannelAccountCreateParams $params
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|ChannelAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts', $channelID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }

    /**
     * @api
     *
     * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
     *
     * @param int $channelAccountID Path param: The channel account to update
     * @param array{
     *   channelID: int, authorized?: bool, name?: string
     * }|ChannelAccountUpdateParams $params
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function update(
        int $channelAccountID,
        array|ChannelAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['channelID'])),
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of accounts for a custom channel.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   defaultPageLength?: int,
     *   deliveryIdentifierType?: list<string>,
     *   deliveryIdentifierValue?: list<string>,
     *   limit?: int,
     *   sort?: list<string>,
     * }|ChannelAccountListParams $params
     *
     * @return BaseResponse<Page<PublicChannelAccount>>
     *
     * @throws APIException
     */
    public function list(
        int $channelID,
        array|ChannelAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts', $channelID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
     *
     * @param int $channelAccountID path param: The ID of the channel account to retrieve
     * @param array{channelID: int, archived?: bool}|ChannelAccountGetParams $params
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        array|ChannelAccountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }
}
