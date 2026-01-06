<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ChannelsContract;

final class ChannelsService implements ChannelsContract
{
    /**
     * @api
     */
    public ChannelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelsRawService($client);
    }

    /**
     * @api
     *
     * @param list<string> $sort
     *
     * @return Page<PublicChannel>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'defaultPageLength' => $defaultPageLength,
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
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannel {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($channelID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
