<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\ExportsContract;
use HubspotSDK\TaskLocator;

final class ExportsService implements ExportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Begins exporting CRM data for the portal as specified in the request body
     *
     * @throws APIException
     */
    public function create(?RequestOptions $requestOptions = null): TaskLocator
    {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/exports/export/async',
            options: $requestOptions,
            convert: TaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Returns the status of the export with taskId, including the URL of the resulting file if the export status is COMPLETE
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): ActionResponseWithSingleResultUri {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/exports/export/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: ActionResponseWithSingleResultUri::class,
        );
    }
}
