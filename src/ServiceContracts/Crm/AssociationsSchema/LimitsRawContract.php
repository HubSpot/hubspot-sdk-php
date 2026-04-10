<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\AssociationsSchema;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubSpotSDK\Crm\AssociationsSchema\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubSpotSDK\Crm\AssociationsSchema\Limits\LimitBatchDeleteParams;
use HubSpotSDK\Crm\AssociationsSchema\Limits\LimitBatchUpdateParams;
use HubSpotSDK\Crm\AssociationsSchema\Limits\LimitGetByObjectTypesParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param string $toObjectType Path param
     * @param array<string,mixed>|LimitBatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
     * @param string $toObjectType Path param
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
