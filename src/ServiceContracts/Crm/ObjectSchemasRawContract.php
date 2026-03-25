<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaCreateAssociationParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaCreateParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteAssociationParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaGetParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaListParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaUpdateParams;
use HubspotSDK\Events\AssociationDefinition;
use HubspotSDK\ObjectSchema;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
