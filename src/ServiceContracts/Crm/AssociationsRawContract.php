<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Associations\AssociationListParams;
use HubspotSDK\Crm\Associations\AssociationSearchParams;
use HubspotSDK\Crm\Associations\AssociationUpdateAssociationLabelsParams;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssociationsRawContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param array<string,mixed>|AssociationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MultiAssociatedObjectWithLabel>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AssociationDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectID,
        array|AssociationDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|AssociationSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|AssociationSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
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
