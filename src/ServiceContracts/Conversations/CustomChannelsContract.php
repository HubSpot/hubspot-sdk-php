<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations;

use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CustomChannelsContract
{
    /**
     * @api
     *
     * @param array<string,mixed> $capabilities
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param array<string,mixed> $capabilities
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelIntegrationChannel;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $channelID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $channelAccountID Path param
     * @param int $channelID Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        int $channelID,
        bool $archived = false,
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelAccount;
}
