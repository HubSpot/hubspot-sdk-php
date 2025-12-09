<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\Channels\ChannelListParams;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ChannelsRawContract;

final class ChannelsRawService implements ChannelsRawContract
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
     *   after?: string, defaultPageLength?: int, limit?: int, sort?: list<string>
     * }|ChannelListParams $params
     *
     * @return BaseResponse<Page<PublicChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/channels',
            query: $parsed,
            options: $options,
            convert: PublicChannel::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @return BaseResponse<PublicChannel>
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/channels/%1$s', $channelID],
            options: $requestOptions,
            convert: PublicChannel::class,
        );
    }
}
