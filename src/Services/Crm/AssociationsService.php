<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\AssociationsContract;
use HubspotSDK\Services\Crm\Associations\BatchService;

/**
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AssociationsService implements AssociationsContract
{
    /**
     * @api
     */
    public AssociationsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssociationsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAssociations(
        string $toObjectID,
        string $objectType,
        string $objectID,
        string $toObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'objectID' => $objectID,
                'toObjectType' => $toObjectType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAssociations($toObjectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @param int $userID The user for the report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): ReportCreationResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->requestHighUsageReport($userID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $toObjectID Path param
     * @param string $objectType Path param
     * @param string $objectID Path param
     * @param string $toObjectType Path param
     * @param list<AssociationSpec|AssociationSpecShape> $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateAssociationLabels(
        string $toObjectID,
        string $objectType,
        string $objectID,
        string $toObjectType,
        array $body,
        RequestOptions|array|null $requestOptions = null,
    ): LabelsBetweenObjectPair {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'objectID' => $objectID,
                'toObjectType' => $toObjectType,
                'body' => $body,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateAssociationLabels($toObjectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
