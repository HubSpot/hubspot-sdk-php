<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannelsContract;
use HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountsService;
use HubspotSDK\Services\Conversations\CustomChannels\MessagesService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CustomChannelsService implements CustomChannelsContract
{
    /**
     * @api
     */
    public CustomChannelsRawService $raw;

    /**
     * @api
     */
    public ChannelAccountsService $channelAccounts;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomChannelsRawService($client);
        $this->channelAccounts = new ChannelAccountsService($client);
        $this->messages = new MessagesService($client);
    }

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
    ): PublicChannelIntegrationChannel {
        $params = Util::removeNulls(
            [
                'capabilities' => $capabilities,
                'name' => $name,
                'channelAccountConnectionRedirectURL' => $channelAccountConnectionRedirectURL,
                'channelDescription' => $channelDescription,
                'channelLogoURL' => $channelLogoURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the capabilities for an existing. You can also use it to update the channel's webhookUri and its channelAccountConnectionRedirectUrl.
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
    ): PublicChannelIntegrationChannel {
        $params = Util::removeNulls(
            [
                'capabilities' => $capabilities,
                'channelAccountConnectionRedirectURL' => $channelAccountConnectionRedirectURL,
                'channelDescription' => $channelDescription,
                'channelLogoURL' => $channelLogoURL,
                'name' => $name,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'defaultPageLength' => $defaultPageLength,
                'limit' => $limit,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive an existing registered custom channel
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $channelID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($channelID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
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
    ): PublicChannelAccount {
        $params = Util::removeNulls(
            ['channelID' => $channelID, 'archived' => $archived]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($channelAccountID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
