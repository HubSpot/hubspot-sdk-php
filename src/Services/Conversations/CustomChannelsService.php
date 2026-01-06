<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannelsContract;
use HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountsService;
use HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountStagingTokensService;
use HubspotSDK\Services\Conversations\CustomChannels\MessagesService;

final class CustomChannelsService implements CustomChannelsContract
{
    /**
     * @api
     */
    public CustomChannelsRawService $raw;

    /**
     * @api
     */
    public ChannelAccountStagingTokensService $channelAccountStagingTokens;

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
        $this->channelAccountStagingTokens = new ChannelAccountStagingTokensService($client);
        $this->channelAccounts = new ChannelAccountsService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Register a new channel along with its capabilities and the webhook url that will be used to receive messages published over the channel
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
    ): PublicChannelIntegrationChannel {
        $params = [
            'capabilities' => $capabilities,
            'name' => $name,
            'channelAccountConnectionRedirectURL' => $channelAccountConnectionRedirectURL,
            'channelDescription' => $channelDescription,
            'channelLogoURL' => $channelLogoURL,
            'webhookURL' => $webhookURL,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the capabilities for an existing. You can also use it to update the channel's webhookUri and its channelAccountConnectionRedirectUrl.
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
    ): PublicChannelIntegrationChannel {
        $params = [
            'capabilities' => $capabilities,
            'channelAccountConnectionRedirectURL' => $channelAccountConnectionRedirectURL,
            'channelDescription' => $channelDescription,
            'channelLogoURL' => $channelLogoURL,
            'name' => $name,
            'webhookURL' => $webhookURL,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all custom channels associated with the app.
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
    ): Page {
        $params = [
            'after' => $after,
            'defaultPageLength' => $defaultPageLength,
            'limit' => $limit,
            'sort' => $sort,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive an existing registered custom channel
     *
     * @throws APIException
     */
    public function delete(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($channelID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details about a custom channel. This API allows you to see a custom channel's current capabilties and other configuration metadata
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelIntegrationChannel {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($channelID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
