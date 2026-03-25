<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\AssociationDeleteAssociationsParams;
use HubspotSDK\Crm\Associations\AssociationUpdateAssociationLabelsParams;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssociationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AssociationDeleteAssociationsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociations(
        string $toObjectID,
        array|AssociationDeleteAssociationsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $userID The user for the report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportCreationResponse>
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectID Path param
     * @param array<string,mixed>|AssociationUpdateAssociationLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelsBetweenObjectPair>
     *
     * @throws APIException
     */
    public function updateAssociationLabels(
        string $toObjectID,
        array|AssociationUpdateAssociationLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
