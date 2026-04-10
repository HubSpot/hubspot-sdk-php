<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\AssociationDefinition;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchema;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaCreateAssociationParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaCreateParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteAssociationParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaGetParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaListParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaUpdateParams;
use HubSpotSDK\ObjectTypeDefinition;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ObjectSchemasRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function create(
        array|ObjectSchemaCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectTypeDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|ObjectSchemaUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectSchemaNoPaging>
     *
     * @throws APIException
     */
    public function list(
        array|ObjectSchemaListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|ObjectSchemaDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaCreateAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociationDefinition>
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|ObjectSchemaCreateAssociationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaDeleteAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        array|ObjectSchemaDeleteAssociationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ObjectSchemaGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|ObjectSchemaGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
