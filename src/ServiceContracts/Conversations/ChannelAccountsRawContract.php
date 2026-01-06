<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\ChannelAccounts\ChannelAccountListParams;
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
     * @param array<mixed>|ChannelAccountListParams $params
     *
     * @return BaseResponse<Page<PublicChannelAccount>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountGetParams $params
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
