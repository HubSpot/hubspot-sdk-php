<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelListParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Contracts\BaseResponse;
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
        $this->channelAccountStagingTokens = new ChannelAccountStagingTokensService($client);
        $this->channelAccounts = new ChannelAccountsService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Register a new channel along with its capabilities and the webhook url that will be used to receive messages published over the channel
     *
     * @param array{
     *   capabilities: array<string,mixed>,
     *   name: string,
     *   channelAccountConnectionRedirectUrl?: string,
     *   channelDescription?: string,
     *   channelLogoUrl?: string,
     *   webhookUrl?: string,
     * }|CustomChannelCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CustomChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel {
        [$parsed, $options] = CustomChannelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicChannelIntegrationChannel> */
        $response = $this->client->request(
            method: 'post',
            path: 'conversations/v3/custom-channels/',
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the capabilities for an existing. You can also use it to update the channel's webhookUri and its channelAccountConnectionRedirectUrl.
     *
     * @param array{
     *   capabilities: array<string,mixed>,
     *   channelAccountConnectionRedirectUrl: mixed,
     *   channelDescription: mixed,
     *   channelLogoUrl: mixed,
     *   name: mixed,
     *   webhookUrl: mixed,
     * }|CustomChannelUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $channelID,
        array|CustomChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel {
        [$parsed, $options] = CustomChannelUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicChannelIntegrationChannel> */
        $response = $this->client->request(
            method: 'patch',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all custom channels associated with the app.
     *
     * @param array{
     *   after?: string, defaultPageLength?: int, limit?: int, sort?: list<string>
     * }|CustomChannelListParams $params
     *
     * @return Page<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function list(
        array|CustomChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = CustomChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<PublicChannelIntegrationChannel>> */
        $response = $this->client->request(
            method: 'get',
            path: 'conversations/v3/custom-channels/',
            query: $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
            page: Page::class,
        );

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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            options: $requestOptions,
            convert: null,
        );

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
        /** @var BaseResponse<PublicChannelIntegrationChannel> */
        $response = $this->client->request(
            method: 'get',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            options: $requestOptions,
            convert: PublicChannelIntegrationChannel::class,
        );

        return $response->parse();
    }
}
