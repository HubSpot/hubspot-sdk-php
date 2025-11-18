<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\V4MergeParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\V4Contract;
use HubspotSDK\Services\Crm\Associations\V4\BatchService;
use HubspotSDK\Services\Crm\Associations\V4\ReportService;

final class V4Service implements V4Contract
{
    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public ReportService $report;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
        $this->report = new ReportService($client);
    }

    /**
     * @api
     *
     * Merge two CRM objects of the specified type into one.
     *
     * @param array{
     *   objectIdToMerge: string, primaryObjectId: string
     * }|V4MergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        string $objectType,
        array|V4MergeParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = V4MergeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v4/objects/%1$s/merge', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: SimplePublicObject::class,
        );
    }
}
