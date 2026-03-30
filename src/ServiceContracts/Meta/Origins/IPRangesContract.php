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
    ): CollectionResponseIPRangeNoPaging;

    /**
     * @api
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
    ): string;
}
