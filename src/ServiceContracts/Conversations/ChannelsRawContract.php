<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\Channels\ChannelListParams;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChannelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannel>
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
