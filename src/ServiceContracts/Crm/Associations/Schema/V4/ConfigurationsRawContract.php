<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationBatchCreateParams;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationBatchDeleteParams;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationBatchUpdateParams;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationGetByObjectTypesParams;
use HubspotSDK\RequestOptions;

interface ConfigurationsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfiguration,>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array<mixed>|ConfigurationBatchCreateParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionUserConfiguration>
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        array|ConfigurationBatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array<mixed>|ConfigurationBatchDeleteParams $params
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        array|ConfigurationBatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array<mixed>|ConfigurationBatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionConfigurationUpdateResult,>
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        array|ConfigurationBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConfigurationGetByObjectTypesParams $params
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfiguration,>
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        array|ConfigurationGetByObjectTypesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
