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
use HubspotSDK\ServiceContracts\Conversations\ChannelsContract;

final class ChannelsService implements ChannelsContract
{
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
     * @return Page<PublicChannel>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<PublicChannel>> */
        $response = $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/channels',
            query: $parsed,
            options: $options,
            convert: PublicChannel::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannel {
        /** @var BaseResponse<PublicChannel> */
        $response = $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/channels/%1$s', $channelID],
            options: $requestOptions,
            convert: PublicChannel::class,
        );

        return $response->parse();
    }
}
