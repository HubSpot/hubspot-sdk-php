<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssociationsContract
{
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
    ): mixed;

    /**
     * @api
     *
     * @param int $userID The user for the report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): ReportCreationResponse;

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
    ): LabelsBetweenObjectPair;
}
