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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface LimitsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LimitGetAssociationLabelLimitsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAssociationLabelLimitResponseNoPaging>
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        array|LimitGetAssociationLabelLimitsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     * @param array<string,mixed>|LimitGetAssociationRecordsLimitsByObjectTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociationRecordLimitResponse>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        array|LimitGetAssociationRecordsLimitsByObjectTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalculatedPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomObjectLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineLimitResponse>
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordLimitResponse>
     *
     * @throws APIException
     */
    public function getRecordLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
