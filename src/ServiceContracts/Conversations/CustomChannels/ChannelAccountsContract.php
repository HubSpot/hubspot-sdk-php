<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|ChannelAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;

    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $channelAccountID,
        array|ChannelAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;

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
        int $channelID,
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
