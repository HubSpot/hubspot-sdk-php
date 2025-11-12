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
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\SchemasContract;

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
     * @param array{
     *   appId: string,
     *   clearDescription?: bool,
     *   description?: string,
     *   labels?: array{plural?: string, singular?: string}|ObjectTypeDefinitionLabels,
     *   primaryDisplayProperty?: string,
     *   requiredProperties?: list<string>,
     *   restorable?: bool,
     *   searchableProperties?: list<string>,
     *   secondaryDisplayProperties?: list<string>,
     * }|SchemaUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|SchemaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectsSchemasObjectTypeDefinition {
        [$parsed, $options] = SchemaUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['media-bridge/v1/%1$s/schemas/%2$s', $appID, $objectType],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: ObjectsSchemasObjectTypeDefinition::class,
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
     * @param array{
     *   appId: string, fromObjectTypeId: string, toObjectTypeId: string, name?: string
     * }|SchemaCreateAssociationParams $params
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|SchemaCreateAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociationDefinition {
        [$parsed, $options] = SchemaCreateAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/schemas/%2$s/associations', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing association definition for an object type.
     *
     * @param array{
     *   appId: string, objectType: string
     * }|SchemaDeleteAssociationParams $params
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        array|SchemaDeleteAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = SchemaDeleteAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
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
     * @param array{appId: string}|SchemaGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|SchemaGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectSchema {
        [$parsed, $options] = SchemaGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/schemas/%2$s', $appID, $objectType],
            options: $options,
            convert: ObjectSchema::class,
        );
    }
}
