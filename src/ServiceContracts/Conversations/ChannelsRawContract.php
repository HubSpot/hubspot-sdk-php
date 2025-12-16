<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\Channels\ChannelListParams;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChannelListParams $params
     *
     * @return BaseResponse<Page<PublicChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PublicChannel>
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
