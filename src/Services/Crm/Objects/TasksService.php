<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\TasksContract;
use HubspotSDK\Services\Crm\Objects\Tasks\BatchService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TasksService implements TasksContract
{
    /**
     * @api
     */
    public TasksRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TasksRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Move an Object identified by `{taskId}` to the recycling bin.
     *
     * @param string $objectID Unique Task Id
     * @param string $objectType object type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
