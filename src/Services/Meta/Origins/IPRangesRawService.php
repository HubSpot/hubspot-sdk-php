<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Meta\Origins;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Meta\Origins\CollectionResponseIPRangeNoPaging;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Direction;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Service;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Meta\Origins\IPRangesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class IPRangesRawService implements IPRangesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a collection of IP ranges associated with specific services and directions, such as `EMAIL`, `API`, `DNS`, or `WEB_SCRAPING`. The response includes details like CIDR notation, description, and the direction of IP traffic.
     *
     * @param array{
     *   direction?: list<Direction|value-of<Direction>>,
     *   service?: list<Service|value-of<Service>>,
     * }|IPRangeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseIPRangeNoPaging>
     *
     * @throws APIException
     */
    public function list(
        array|IPRangeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPRangeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'meta/network-origins/2026-03/ip-ranges',
            query: $parsed,
            options: $options,
            convert: CollectionResponseIPRangeNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a simplified list of IP ranges for specified services and directions in plain text format. This endpoint provides a straightforward representation of IP ranges without additional metadata.
     *
     * @param array{
     *   direction?: list<IPRangeListSimpleParams\Direction|value-of<IPRangeListSimpleParams\Direction>>,
     *   service?: list<IPRangeListSimpleParams\Service|value-of<IPRangeListSimpleParams\Service>>,
     * }|IPRangeListSimpleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listSimple(
        array|IPRangeListSimpleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPRangeListSimpleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'meta/network-origins/2026-03/ip-ranges/simple',
            query: $parsed,
            headers: ['Accept' => 'text/plain'],
            options: $options,
            convert: 'string',
        );
    }
}
