<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelAccountForwardPaging;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelAccountForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $channelAccountID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelAccount;
}
