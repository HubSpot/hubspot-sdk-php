<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\V4\Batch\BatchCreateDefaultParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchCreateParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchDeleteLabelsParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchGetParams;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array<mixed>|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponseLabelsBetweenObjectPair>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the batch association deletion
     * @param array<mixed>|BatchDeleteParams $params
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the association
     * @param array<mixed>|BatchCreateDefaultParams $params
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        array|BatchCreateDefaultParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array<mixed>|BatchDeleteLabelsParams $params
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        array|BatchDeleteLabelsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array<mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationMultiWithLabel>
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
