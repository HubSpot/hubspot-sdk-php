<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\Channels\ChannelListParams;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChannelListParams $params
     *
     * @return Page<PublicChannel>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannel;
}
