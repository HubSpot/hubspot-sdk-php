<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelListParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CustomChannelsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomChannelCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CustomChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param array<mixed>|CustomChannelUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $channelID,
        array|CustomChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param array<mixed>|CustomChannelListParams $params
     *
     * @return Page<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function list(
        array|CustomChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelIntegrationChannel;
}
