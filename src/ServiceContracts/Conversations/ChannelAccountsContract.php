<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\ChannelAccounts\ChannelAccountListParams;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountListParams $params
     *
     * @return Page<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        array|ChannelAccountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;
}
