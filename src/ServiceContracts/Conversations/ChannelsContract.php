<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelForwardPaging;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ChannelsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannel;
}
