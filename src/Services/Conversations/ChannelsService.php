<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelForwardPaging;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Exceptions\APIException;
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
     * Retrieve a list of channels, with optional filters and sorting.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/channels',
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicChannelForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single channel using the channel ID.
     *
     * @throws APIException
     */
    public function get(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannel {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/channels/%1$s', $channelID],
            options: $requestOptions,
            convert: PublicChannel::class,
        );
    }
}
