<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

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

interface SchemasContract
{
    /**
     * @api
     *
     * @param array<mixed>|SchemaCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SchemaCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema;

    /**
     * @api
     *
     * @param array<mixed>|SchemaUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|SchemaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectsSchemasObjectTypeDefinition;

    /**
     * @api
     *
     * @param array<mixed>|SchemaListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SchemaListParams $params,
        ?RequestOptions $requestOptions = null
    ): SchemaListResponse;

    /**
     * @api
     *
     * @param array<mixed>|SchemaDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|SchemaDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SchemaCreateAssociationParams $params
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|SchemaCreateAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociationDefinition;

    /**
     * @api
     *
     * @param array<mixed>|SchemaDeleteAssociationParams $params
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        array|SchemaDeleteAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema;
}
