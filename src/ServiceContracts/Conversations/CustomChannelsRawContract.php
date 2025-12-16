<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelListParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CustomChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CustomChannelCreateParams $params
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function create(
        array|CustomChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $channelID the ID of the channel to update
     * @param array<string,mixed>|CustomChannelUpdateParams $params
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function update(
        int $channelID,
        array|CustomChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomChannelListParams $params
     *
     * @return BaseResponse<Page<PublicChannelIntegrationChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|CustomChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
