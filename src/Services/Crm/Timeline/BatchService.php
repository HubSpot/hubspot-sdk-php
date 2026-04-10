<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Timeline;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Timeline\AppEventOccurrence;
use HubSpotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Timeline\BatchContract;

/**
 * @phpstan-import-type AppEventOccurrenceShape from \HubSpotSDK\Crm\Timeline\AppEventOccurrence
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

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
    ): BatchResponseAppEventOccurrence {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
