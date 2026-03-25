<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Meta\Origins;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Meta\Origins\CollectionResponseIPRangeNoPaging;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Direction;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Service;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface IPRangesContract
{
    /**
     * @api
     *
     * @param list<Direction|value-of<Direction>> $direction An array of traffic directions to filter the IP ranges. Valid values are `INGRESS` and `EGRESS`.
     * @param list<Service|value-of<Service>> $service An array of service types to filter the IP ranges. Valid values include `EMAIL`, `API`, `DNS`, `WEB_SCRAPING`, and `TEST_SERVICE`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?array $direction = null,
        ?array $service = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseIPRangeNoPaging;

    /**
     * @api
     *
     * @param list<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction|value-of<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction>> $direction An array of directions to filter the IP ranges by. Valid values are `INGRESS` and `EGRESS`.
     * @param list<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service|value-of<\HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service>> $service An array specifying the service types to filter by. Valid values include `EMAIL`, `API`, `DNS`, `WEB_SCRAPING`, and `TEST_SERVICE`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSimple(
        ?array $direction = null,
        ?array $service = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
