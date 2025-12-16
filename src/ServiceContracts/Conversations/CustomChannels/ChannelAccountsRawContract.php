<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelAccountsRawContract
{
    /**
     * @api
     *
     * @param int $channelID the ID of the channel for which the account is being created
     * @param array<string,mixed>|ChannelAccountCreateParams $params
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|ChannelAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $channelAccountID Path param: The channel account to update
     * @param array<string,mixed>|ChannelAccountUpdateParams $params
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function update(
        int $channelAccountID,
        array|ChannelAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ChannelAccountListParams $params
     *
     * @return BaseResponse<Page<PublicChannelAccount>>
     *
     * @throws APIException
     */
    public function list(
        int $channelID,
        array|ChannelAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $channelAccountID path param: The ID of the channel account to retrieve
     * @param array<string,mixed>|ChannelAccountGetParams $params
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        array|ChannelAccountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
