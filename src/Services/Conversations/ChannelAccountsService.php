<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelAccountForwardPaging;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ChannelAccountsContract;

final class ChannelAccountsService implements ChannelAccountsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of channel accounts, with optional filters and sorting.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelAccountForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/channel-accounts',
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicChannelAccountForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single channel account using the channel account ID.
     *
     * @throws APIException
     */
    public function get(
        string $channelAccountID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelAccount {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/conversations/channel-accounts/%1$s',
                $channelAccountID,
            ],
            options: $requestOptions,
            convert: PublicChannelAccount::class,
        );
    }
}
