<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\AssociationsSchema;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\AssociationsSchema\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubspotSDK\Crm\AssociationsSchema\Limits\LimitBatchDeleteParams;
use HubspotSDK\Crm\AssociationsSchema\Limits\LimitBatchUpdateParams;
use HubspotSDK\Crm\AssociationsSchema\Limits\LimitGetByObjectTypesParams;
use HubspotSDK\Crm\BatchResponseVoid;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface LimitsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging,>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|LimitBatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        array|LimitBatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|LimitBatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionConfigurationUpdateResult,>
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        array|LimitBatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType the type of the target object in the association
     * @param array<string,mixed>|LimitGetByObjectTypesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging,>
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        array|LimitGetByObjectTypesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
