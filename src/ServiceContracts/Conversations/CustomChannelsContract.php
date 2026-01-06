<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CustomChannelsContract
{
    /**
     * @api
     *
     * @param array<string,mixed> $capabilities
     *
     * @throws APIException
     */
    public function create(
        array $capabilities,
        string $name,
        ?string $channelAccountConnectionRedirectURL = null,
        ?string $channelDescription = null,
        ?string $channelLogoURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param int $channelID the ID of the channel to update
     * @param array<string,mixed> $capabilities
     *
     * @throws APIException
     */
    public function update(
        int $channelID,
        array $capabilities,
        mixed $channelAccountConnectionRedirectURL,
        mixed $channelDescription,
        mixed $channelLogoURL,
        mixed $name,
        mixed $webhookURL,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $defaultPageLength specify the default number of results to return per page
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort specify the sorting order for the results
     *
     * @return Page<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
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
