<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\LinksContract;

final class LinksService implements LinksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   channel: "EMAIL",
     *   subscriberIdString: string,
     *   businessUnitId?: int,
     *   language?: string,
     *   subscriptionId?: int,
     * }|LinkCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|LinkCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): LinkGenerationResponse {
        [$parsed, $options] = LinkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/links/generate',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: LinkGenerationResponse::class,
        );
    }
}
