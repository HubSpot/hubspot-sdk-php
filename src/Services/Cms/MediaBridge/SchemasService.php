<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaListResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\SchemasContract;

final class SchemasService implements SchemasContract
{
    /**
     * @api
     */
    public SchemasRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SchemasRawService($client);
    }

    /**
     * @api
     *
     * Update the schema for an existing object type
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
    ): ObjectsSchemasObjectTypeDefinition {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'clearDescription' => $clearDescription,
                'description' => $description,
                'labels' => $labels,
                'primaryDisplayProperty' => $primaryDisplayProperty,
                'requiredProperties' => $requiredProperties,
                'restorable' => $restorable,
                'searchableProperties' => $searchableProperties,
                'secondaryDisplayProperties' => $secondaryDisplayProperties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the schemas for all object types.
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
    ): SchemaListResponse {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new association definition for the specified object type.
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
    ): AssociationDefinition {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'fromObjectTypeID' => $fromObjectTypeID,
                'toObjectTypeID' => $toObjectTypeID,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAssociation($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing association definition for an object type.
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
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAssociation($associationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the schema for a specified object type.
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
    ): ObjectSchema {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
