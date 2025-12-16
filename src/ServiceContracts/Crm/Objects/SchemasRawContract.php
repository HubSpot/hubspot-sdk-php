<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Crm\Objects\Schemas\SchemaCreateAssociationParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaCreateParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaDeleteAssociationParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaDeleteParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaListParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaListResponse;
use HubspotSDK\Crm\Objects\Schemas\SchemaUpdateParams;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\RequestOptions;

interface SchemasRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SchemaCreateParams $params
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function create(
        array|SchemaCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     * @param array<string,mixed>|SchemaUpdateParams $params
     *
     * @return BaseResponse<ObjectsSchemasObjectTypeDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|SchemaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SchemaListParams $params
     *
     * @return BaseResponse<SchemaListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SchemaListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     * @param array<string,mixed>|SchemaDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|SchemaDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     * @param array<string,mixed>|SchemaCreateAssociationParams $params
     *
     * @return BaseResponse<AssociationDefinition>
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|SchemaCreateAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $associationIdentifier unique ID of the association to remove
     * @param array<string,mixed>|SchemaDeleteAssociationParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        array|SchemaDeleteAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
