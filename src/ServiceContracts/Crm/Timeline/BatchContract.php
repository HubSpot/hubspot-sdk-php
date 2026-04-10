<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Timeline;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Timeline\AppEventOccurrence;
use HubSpotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type AppEventOccurrenceShape from \HubSpotSDK\Crm\Timeline\AppEventOccurrence
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<AppEventOccurrence|AppEventOccurrenceShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseAppEventOccurrence;
}
