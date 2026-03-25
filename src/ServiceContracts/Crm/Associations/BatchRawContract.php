<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Batch\BatchCreateDefaultParams;
use HubspotSDK\Crm\Associations\Batch\BatchCreateParams;
use HubspotSDK\Crm\Associations\Batch\BatchDeleteLabelsParams;
use HubspotSDK\Crm\Associations\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Associations\Batch\BatchGetParams;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\Crm\BatchResponseVoid;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the batch association deletion
     * @param array<string,mixed>|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the association
     * @param array<string,mixed>|BatchCreateDefaultParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        array|BatchCreateDefaultParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array<string,mixed>|BatchDeleteLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        array|BatchDeleteLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array<string,mixed>|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicAssociationMultiWithLabel>
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
