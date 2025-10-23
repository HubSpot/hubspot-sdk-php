<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\LinksContract;

use const HubspotSDK\Core\OMIT as omit;

final class LinksService implements LinksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param Channel|value-of<Channel> $channel
     * @param string $subscriberIDString
     * @param int $businessUnitID
     * @param string $language
     * @param int $subscriptionID
     *
     * @throws APIException
     */
    public function create(
        $channel,
        $subscriberIDString,
        $businessUnitID = omit,
        $language = omit,
        $subscriptionID = omit,
        ?RequestOptions $requestOptions = null,
    ): LinkGenerationResponse {
        $params = [
            'channel' => $channel,
            'subscriberIDString' => $subscriberIDString,
            'businessUnitID' => $businessUnitID,
            'language' => $language,
            'subscriptionID' => $subscriptionID,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LinkGenerationResponse {
        [$parsed, $options] = LinkCreateParams::parseRequest(
            $params,
            $requestOptions
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
