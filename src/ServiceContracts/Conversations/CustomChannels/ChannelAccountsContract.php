<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelAccountForwardPaging;
use HubspotSDK\Conversations\ConversationsPublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
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
        string $channelID,
        array|ChannelAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;

    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $channelAccountID,
        array|ChannelAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelAccountForwardPaging;

    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $channelAccountID,
        array|ChannelAccountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;
}
