<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\CRMAssociationDefinition;
use HubspotSDK\CRM\CRMCollectionResponseObjectSchemaNoPaging;
use HubspotSDK\CRM\CRMObjectSchema;
use HubspotSDK\CRM\CRMObjectTypeDefinition;
use HubspotSDK\CRM\CRMObjectTypeDefinitionLabels;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate;
use HubspotSDK\CRM\ObjectSchemas\ObjectSchemaArchiveAssociationParams;
use HubspotSDK\CRM\ObjectSchemas\ObjectSchemaCreateAssociationParams;
use HubspotSDK\CRM\ObjectSchemas\ObjectSchemaCreateParams;
use HubspotSDK\CRM\ObjectSchemas\ObjectSchemaDeleteParams;
use HubspotSDK\CRM\ObjectSchemas\ObjectSchemaListParams;
use HubspotSDK\CRM\ObjectSchemas\ObjectSchemaUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\ObjectSchemasContract;

use const HubspotSDK\Core\OMIT as omit;

final class ObjectSchemasService implements ObjectSchemasContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new schema
     *
     * @param list<string> $associatedObjects
     * @param CRMObjectTypeDefinitionLabels $labels
     * @param string $name
     * @param list<CRMObjectTypePropertyCreate> $properties
     * @param list<string> $requiredProperties
     * @param string $primaryDisplayProperty
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     *
     * @throws APIException
     */
    public function create(
        $associatedObjects,
        $labels,
        $name,
        $properties,
        $requiredProperties,
        $primaryDisplayProperty = omit,
        $searchableProperties = omit,
        $secondaryDisplayProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectSchema {
        $params = [
            'associatedObjects' => $associatedObjects,
            'labels' => $labels,
            'name' => $name,
            'properties' => $properties,
            'requiredProperties' => $requiredProperties,
            'primaryDisplayProperty' => $primaryDisplayProperty,
            'searchableProperties' => $searchableProperties,
            'secondaryDisplayProperties' => $secondaryDisplayProperties,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectSchema {
        [$parsed, $options] = ObjectSchemaCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm-object-schemas/v3/schemas',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectSchema::class,
        );
    }

    /**
     * @api
     *
     * Update a schema
     *
     * @param bool $clearDescription
     * @param CRMObjectTypeDefinitionLabels $labels
     * @param string $primaryDisplayProperty
     * @param list<string> $requiredProperties
     * @param bool $restorable
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        $clearDescription = omit,
        $labels = omit,
        $primaryDisplayProperty = omit,
        $requiredProperties = omit,
        $restorable = omit,
        $searchableProperties = omit,
        $secondaryDisplayProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectTypeDefinition {
        $params = [
            'clearDescription' => $clearDescription,
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
    ): CRMObjectTypeDefinition {
        [$parsed, $options] = ObjectSchemaUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Get all schemas
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function list(
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): CRMCollectionResponseObjectSchemaNoPaging {
        $params = ['archived' => $archived];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMCollectionResponseObjectSchemaNoPaging {
        [$parsed, $options] = ObjectSchemaListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm-object-schemas/v3/schemas',
            query: $parsed,
            options: $options,
            convert: CRMCollectionResponseObjectSchemaNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a schema
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->deleteRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ObjectSchemaDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Remove an association
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function archiveAssociation(
        string $associationIdentifier,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['objectType' => $objectType];

        return $this->archiveAssociationRaw(
            $associationIdentifier,
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
    public function archiveAssociationRaw(
        string $associationIdentifier,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ObjectSchemaArchiveAssociationParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm-object-schemas/v3/schemas/%1$s/associations/%2$s',
                $objectType,
                $associationIdentifier,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create an association
     *
     * @param string $fromObjectTypeID
     * @param string $toObjectTypeID
     * @param string $name
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        $fromObjectTypeID,
        $toObjectTypeID,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationDefinition {
        $params = [
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
    ): CRMAssociationDefinition {
        [$parsed, $options] = ObjectSchemaCreateAssociationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm-object-schemas/v3/schemas/%1$s/associations', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CRMAssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Get an existing schema
     *
     * @throws APIException
     */
    public function read(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CRMObjectSchema {
        $params = [];

        return $this->readRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectType,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectSchema {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            options: $requestOptions,
            convert: CRMObjectSchema::class,
        );
    }
}
