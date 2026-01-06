<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Schemas\SchemaListResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;

interface SchemasContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type that you want to update the schema for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $clearDescription Body param:
     * @param string $description Body param:
     * @param array{
     *   plural?: string, singular?: string
     * }|ObjectTypeDefinitionLabels $labels Body param:
     * @param string $primaryDisplayProperty Body param: The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $requiredProperties body param: The names of properties that should be **required** when creating an object of this type
     * @param bool $restorable Body param:
     * @param list<string> $searchableProperties body param: Names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties Body param: The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        int $appID,
        ?bool $clearDescription = null,
        ?string $description = null,
        array|ObjectTypeDefinitionLabels|null $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        ?RequestOptions $requestOptions = null,
    ): ObjectsSchemasObjectTypeDefinition;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        bool $archived = false,
        ?RequestOptions $requestOptions = null
    ): SchemaListResponse;

    /**
     * @api
     *
     * @param string $objectType Path param: The object type to create the definition for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $fromObjectTypeID Body param:
     * @param string $toObjectTypeID Body param:
     * @param string $name Body param:
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        int $appID,
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): AssociationDefinition;

    /**
     * @api
     *
     * @param string $associationID the ID of the association definition to be deleted
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType the object type for the definition that you want to delete
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        int $appID,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType the object type to get the schema for
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema;
}
