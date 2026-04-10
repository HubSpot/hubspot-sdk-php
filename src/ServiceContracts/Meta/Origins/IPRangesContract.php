<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Meta\Origins;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Meta\Origins\CollectionResponseIPRangeNoPaging;
use HubSpotSDK\Meta\Origins\IPRanges\IPRangeListParams\Direction;
use HubSpotSDK\Meta\Origins\IPRanges\IPRangeListParams\Service;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param list<\HubSpotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction|value-of<\HubSpotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction>> $direction
     * @param list<\HubSpotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service|value-of<\HubSpotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service>> $service
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
