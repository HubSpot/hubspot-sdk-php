<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\LinksRawContract;

final class LinksRawService implements LinksRawContract
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
     *   channel: 'EMAIL'|Channel,
     *   subscriberIDString: string,
     *   businessUnitID?: int,
     *   language?: string,
     *   subscriptionID?: int,
     * }|LinkCreateParams $params
     *
     * @return BaseResponse<LinkGenerationResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LinkCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = LinkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/links/generate',
            query: Util::array_transform_keys(
                array_diff_key($parsed, $query_params),
                ['businessUnitID' => 'businessUnitId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: LinkGenerationResponse::class,
        );
    }
}
