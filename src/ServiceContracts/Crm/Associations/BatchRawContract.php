<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Batch\BatchCreateParams;
use HubspotSDK\Crm\Associations\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Associations\Batch\BatchGetParams;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociation;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMulti;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociation>
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
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|BatchDeleteParams $params
     *
     * @return BaseResponse<mixed>
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
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationMulti>
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
