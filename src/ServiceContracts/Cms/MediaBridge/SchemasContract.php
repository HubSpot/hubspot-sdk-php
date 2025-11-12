<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Schemas\SchemaCreateAssociationParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaDeleteAssociationParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaGetParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaUpdateParams;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\RequestOptions;

interface SchemasContract
{
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
     * @throws APIException
     */
    public function list(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectSchemaNoPaging;

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
        string $associationID,
        array|SchemaDeleteAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SchemaGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|SchemaGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectSchema;
}
