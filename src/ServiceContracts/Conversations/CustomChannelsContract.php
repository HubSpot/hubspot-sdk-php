<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CustomChannels\CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging;
use HubspotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
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
        string $channelID,
        array|CustomChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelIntegrationChannel;
}
