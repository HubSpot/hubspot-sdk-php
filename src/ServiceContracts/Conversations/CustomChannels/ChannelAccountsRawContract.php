<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateStagingTokenParams;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ChannelAccountsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChannelAccountCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $channelAccountID Path param
     * @param array<string,mixed>|ChannelAccountUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ChannelAccountListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountToken Path param
     * @param array<string,mixed>|ChannelAccountUpdateStagingTokenParams $params
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
    ): BaseResponse;
}
