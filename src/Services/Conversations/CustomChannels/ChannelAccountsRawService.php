<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Conversations\CustomChannels;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams\DeliveryIdentifierType;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateStagingTokenParams;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsRawContract;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param array{
     *   authorized: bool,
     *   inboxID: string,
     *   name: string,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
     * }|ChannelAccountCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|ChannelAccountCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'conversations/custom-channels/2026-03/%1$s/channel-accounts',
                $channelID,
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
     * @param int $channelAccountID Path param
     * @param array{
     *   channelID: int, authorized?: bool, name?: string
     * }|ChannelAccountUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function update(
        int $channelAccountID,
        array|ChannelAccountUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'conversations/custom-channels/2026-03/%1$s/channel-accounts/%2$s',
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
     *   deliveryIdentifierType?: list<DeliveryIdentifierType|value-of<DeliveryIdentifierType>>,
     *   deliveryIdentifierValue?: list<string>,
     *   limit?: int,
     *   sort?: list<string>,
     * }|ChannelAccountListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicChannelAccount>>
     *
     * @throws APIException
     */
    public function list(
        int $channelID,
        array|ChannelAccountListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/custom-channels/2026-03/%1$s/channel-accounts',
                $channelID,
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
     * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
     *
     * @param string $accountToken Path param
     * @param array{
     *   channelID: int,
     *   accountName?: string,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
     * }|ChannelAccountUpdateStagingTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelAccountStagingToken>
     *
     * @throws APIException
     */
    public function updateStagingToken(
        string $accountToken,
        array|ChannelAccountUpdateStagingTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAccountUpdateStagingTokenParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/custom-channels/2026-03/%1$s/channel-account-staging-tokens/%2$s',
                $channelID,
                $accountToken,
            ],
            body: (object) array_diff_key($parsed, array_flip(['channelID'])),
            options: $options,
            convert: PublicChannelAccountStagingToken::class,
        );
    }
}
