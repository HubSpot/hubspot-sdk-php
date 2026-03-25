<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateStagingTokenParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
