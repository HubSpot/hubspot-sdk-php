<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\ChannelAccounts\ChannelAccountListParams;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   channelId?: list<int>,
     *   defaultPageLength?: int,
     *   inboxId?: list<int>,
     *   limit?: int,
     *   sort?: list<string>,
     * }|ChannelAccountListParams $params
     *
     * @return Page<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ChannelAccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/channel-accounts',
            query: $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single channel account using the channel account ID.
     *
     * @param array{archived?: bool}|ChannelAccountGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        array|ChannelAccountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount {
        [$parsed, $options] = ChannelAccountGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/conversations/channel-accounts/%1$s',
                $channelAccountID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }
}
