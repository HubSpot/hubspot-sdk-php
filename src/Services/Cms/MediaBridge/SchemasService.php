<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaCreateAssociationParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaDeleteAssociationParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaGetParams;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaUpdateParams;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Schemas\ObjectSchema;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\SchemasContract;

use const HubspotSDK\Core\OMIT as omit;

final class SchemasService implements SchemasContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update the schema for an existing object type
     *
     * @param string $appID
     * @param bool $clearDescription
     * @param string $description
     * @param ObjectTypeDefinitionLabels $labels
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param bool $restorable
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        $appID,
        $clearDescription = omit,
        $description = omit,
        $labels = omit,
        $primaryDisplayProperty = omit,
        $requiredProperties = omit,
        $restorable = omit,
        $searchableProperties = omit,
        $secondaryDisplayProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): ObjectTypeDefinition {
        $params = [
            'appID' => $appID,
            'clearDescription' => $clearDescription,
            'description' => $description,
            'labels' => $labels,
            'primaryDisplayProperty' => $primaryDisplayProperty,
            'requiredProperties' => $requiredProperties,
            'restorable' => $restorable,
            'searchableProperties' => $searchableProperties,
            'secondaryDisplayProperties' => $secondaryDisplayProperties,
        ];

        return $this->updateRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ObjectTypeDefinition {
        [$parsed, $options] = SchemaUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['media-bridge/v1/%1$s/schemas/%2$s', $appID, $objectType],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: ObjectTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Get the schemas for all object types.
     *
     * @throws APIException
     */
    public function list(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectSchemaNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/schemas', $appID],
            options: $requestOptions,
            convert: CollectionResponseObjectSchemaNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Create a new association definition for the specified object type.
     *
     * @param string $appID
     * @param string $fromObjectTypeID
     * @param string $toObjectTypeID
     * @param string $name
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        $appID,
        $fromObjectTypeID,
        $toObjectTypeID,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): AssociationDefinition {
        $params = [
            'appID' => $appID,
            'fromObjectTypeID' => $fromObjectTypeID,
            'toObjectTypeID' => $toObjectTypeID,
            'name' => $name,
        ];

        return $this->createAssociationRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAssociationRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssociationDefinition {
        [$parsed, $options] = SchemaCreateAssociationParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/schemas/%2$s/associations', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing association definition for an object type.
     *
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        $appID,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['appID' => $appID, 'objectType' => $objectType];

        return $this->deleteAssociationRaw(
            $associationID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteAssociationRaw(
        string $associationID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SchemaDeleteAssociationParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/v1/%1$s/schemas/%2$s/associations/%3$s',
                $appID,
                $objectType,
                $associationID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the schema for a specified object type.
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema {
        $params = ['appID' => $appID];

        return $this->getRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema {
        [$parsed, $options] = SchemaGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/schemas/%2$s', $appID, $objectType],
            options: $options,
            convert: ObjectSchema::class,
        );
    }
}
