<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\AppEventOccurrence;
use HubspotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type AppEventOccurrenceShape from \HubspotSDK\Crm\Timeline\AppEventOccurrence
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
