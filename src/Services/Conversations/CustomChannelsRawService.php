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
use HubspotSDK\ServiceContracts\Conversations\CustomChannelsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CustomChannelsRawService implements CustomChannelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Register a new channel along with its capabilities and the webhook url that will be used to receive messages published over the channel
     *
     * @param array{
     *   capabilities: array<string,mixed>,
     *   name: string,
     *   channelAccountConnectionRedirectURL?: string,
     *   channelDescription?: string,
     *   channelLogoURL?: string,
     *   webhookURL?: string,
     * }|CustomChannelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function create(
        array|CustomChannelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomChannelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $channelID the ID of the channel to update
     * @param array{
     *   capabilities: array<string,mixed>,
     *   channelAccountConnectionRedirectURL: mixed,
     *   channelDescription: mixed,
     *   channelLogoURL: mixed,
     *   name: mixed,
     *   webhookURL: mixed,
     * }|CustomChannelUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function update(
        int $channelID,
        array|CustomChannelUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomChannelUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string, defaultPageLength?: int, limit?: int, sort?: list<string>
     * }|CustomChannelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicChannelIntegrationChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|CustomChannelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/custom-channels/',
            query: $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archive an existing registered custom channel
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $channelID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/custom-channels/%1$s', $channelID],
            options: $requestOptions,
            convert: PublicChannelIntegrationChannel::class,
        );
    }
}
