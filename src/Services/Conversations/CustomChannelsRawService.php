<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Conversations;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelGetParams;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelListParams;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Conversations\CustomChannelsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
            path: 'conversations/custom-channels/2026-03',
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
            path: ['conversations/custom-channels/2026-03/%1$s', $channelID],
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelIntegrationChannel::class,
        );
    }

    /**
     * @api
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
            path: 'conversations/custom-channels/2026-03',
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
            path: ['conversations/custom-channels/2026-03/%1$s', $channelID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
     *
     * @param int $channelAccountID Path param
     * @param array{channelID: int, archived?: bool}|CustomChannelGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        array|CustomChannelGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomChannelGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/custom-channels/2026-03/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }
}
