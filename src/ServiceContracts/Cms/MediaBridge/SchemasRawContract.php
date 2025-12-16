<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Schemas\SchemaCreateAssociationParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaDeleteAssociationParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaGetParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaListParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaListResponse;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\RequestOptions;

interface SchemasRawContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type that you want to update the schema for
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|SchemaListParams $params
     *
     * @return BaseResponse<SchemaListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        array|SchemaListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType Path param: The object type to create the definition for
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
     * @param string $associationID the ID of the association definition to be deleted
     * @param array<string,mixed>|SchemaDeleteAssociationParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        array|SchemaDeleteAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType the object type to get the schema for
     * @param array<string,mixed>|SchemaGetParams $params
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|SchemaGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
