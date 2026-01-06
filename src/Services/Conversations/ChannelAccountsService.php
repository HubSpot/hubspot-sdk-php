<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ChannelAccountsContract;

final class ChannelAccountsService implements ChannelAccountsContract
{
    /**
     * @api
     */
    public ChannelAccountsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelAccountsRawService($client);
    }

    /**
     * @api
     *
     * @param list<int> $channelID
     * @param list<int> $inboxID
     * @param list<string> $sort
     *
     * @return Page<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?array $channelID = null,
        ?int $defaultPageLength = null,
        ?array $inboxID = null,
        ?int $limit = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'channelID' => $channelID,
            'defaultPageLength' => $defaultPageLength,
            'inboxID' => $inboxID,
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
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        bool $archived = false,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount {
        $params = ['archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($channelAccountID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
