<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubspotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubspotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubspotSDK\Crm\Limits\LimitGetAssociationLabelLimitsParams;
use HubspotSDK\Crm\Limits\LimitGetAssociationRecordsLimitsByObjectTypeParams;
use HubspotSDK\Crm\Limits\PipelineLimitResponse;
use HubspotSDK\Crm\Limits\RecordLimitResponse;
use HubspotSDK\RequestOptions;

interface LimitsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LimitGetAssociationLabelLimitsParams $params
     *
     * @return BaseResponse<CollectionResponseAssociationLabelLimitResponseNoPaging>
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        array|LimitGetAssociationLabelLimitsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     * @param array<string,mixed>|LimitGetAssociationRecordsLimitsByObjectTypeParams $params
     *
     * @return BaseResponse<AssociationRecordLimitResponse>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        array|LimitGetAssociationRecordsLimitsByObjectTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CalculatedPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CustomObjectLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CustomPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PipelineLimitResponse>
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<RecordLimitResponse>
     *
     * @throws APIException
     */
    public function getRecordLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
