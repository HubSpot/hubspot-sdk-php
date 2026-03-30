<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Meta\Origins;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Meta\Origins\CollectionResponseIPRangeNoPaging;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Direction;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Service;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Meta\Origins\IPRangesContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class IPRangesService implements IPRangesContract
{
    /**
     * @api
     */
    public IPRangesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IPRangesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a collection of IP ranges associated with specific services and directions, such as `EMAIL`, `API`, `DNS`, or `WEB_SCRAPING`. The response includes details like CIDR notation, description, and the direction of IP traffic.
     *
     * @param list<Direction|value-of<Direction>> $direction
     * @param list<Service|value-of<Service>> $service
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?array $direction = null,
        ?array $service = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseIPRangeNoPaging {
        $params = Util::removeNulls(
            ['direction' => $direction, 'service' => $service]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a simplified list of IP ranges for specified services and directions in plain text format. This endpoint provides a straightforward representation of IP ranges without additional metadata.
     *
     * @param list<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction|value-of<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction>> $direction
     * @param list<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service|value-of<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service>> $service
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSimple(
        ?array $direction = null,
        ?array $service = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['direction' => $direction, 'service' => $service]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSimple(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
