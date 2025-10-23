<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CustomChannels\CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface CustomChannelsContract
{
    /**
     * @api
     *
     * @param array<string, mixed> $capabilities
     * @param string $name
     * @param string $channelAccountConnectionRedirectURL
     * @param string $channelDescription
     * @param string $channelLogoURL
     * @param string $webhookURL
     *
     * @throws APIException
     */
    public function create(
        $capabilities,
        $name,
        $channelAccountConnectionRedirectURL = omit,
        $channelDescription = omit,
        $channelLogoURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param array<string, mixed> $capabilities
     * @param mixed $channelDescription
     * @param mixed $channelLogoURL
     * @param mixed $channelAccountConnectionRedirectURL
     * @param mixed $name
     * @param mixed $webhookURL
     *
     * @throws APIException
     */
    public function update(
        string $channelID,
        $capabilities,
        $channelDescription,
        $channelLogoURL,
        $channelAccountConnectionRedirectURL = omit,
        $name = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $channelID,
        array $params,
        ?RequestOptions $requestOptions = null
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
