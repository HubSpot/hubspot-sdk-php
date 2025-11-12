<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging;
use HubspotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Exceptions\APIException;
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'conversations/v3/custom-channels/',
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
        );
    }

    /**
     * @api
     *
     * Update the capabilities for an existing. You can also use it to update the channel's webhookUri and its channelAccountConnectionRedirectUrl.
     *
     * @param array{
     *   capabilities: array<string,mixed>,
     *   channelDescription: mixed,
     *   channelLogoUrl: mixed,
     *   channelAccountConnectionRedirectUrl?: mixed,
     *   name?: mixed,
     *   webhookUrl?: mixed,
     * }|CustomChannelUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $channelID,
        array|CustomChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelIntegrationChannel {
        [$parsed, $options] = CustomChannelUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all custom channels associated with the app.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/custom-channels/',
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Archive an existing registered custom channel
     *
     * @throws APIException
     */
    public function delete(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the details about a custom channel. This API allows you to see a custom channel's current capabilties and other configuration metadata
     *
     * @throws APIException
     */
    public function get(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelIntegrationChannel {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            options: $requestOptions,
            convert: PublicChannelIntegrationChannel::class,
        );
    }
}
