<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Schemas\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\CRM\Objects\Schemas\ObjectSchema;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinition;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinitionLabels;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate;
use HubspotSDK\CRM\Objects\Schemas\SchemaArchiveAssociationParams;
use HubspotSDK\CRM\Objects\Schemas\SchemaCreateAssociationParams;
use HubspotSDK\CRM\Objects\Schemas\SchemaCreateParams;
use HubspotSDK\CRM\Objects\Schemas\SchemaDeleteParams;
use HubspotSDK\CRM\Objects\Schemas\SchemaListParams;
use HubspotSDK\CRM\Objects\Schemas\SchemaUpdateParams;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\SchemasContract;

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
     * Define a new object schema, along with custom properties and associations. The entire object schema, including its object type ID, properties, and associations will be returned in the response.
     *
     * @param list<string> $associatedObjects associations defined for this object type
     * @param ObjectTypeDefinitionLabels $labels Singular and plural labels for the object. Used in CRM display.
     * @param string $name A unique name for this object. For internal use only.
     * @param list<ObjectTypePropertyCreate> $properties properties defined for this object type
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param string $description
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function create(
        $associatedObjects,
        $labels,
        $name,
        $properties,
        $requiredProperties,
        $description = omit,
        $primaryDisplayProperty = omit,
        $searchableProperties = omit,
        $secondaryDisplayProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): ObjectSchema {
        $params = [
            'associatedObjects' => $associatedObjects,
            'labels' => $labels,
            'name' => $name,
            'properties' => $properties,
            'requiredProperties' => $requiredProperties,
            'description' => $description,
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
    ): ObjectSchema {
        [$parsed, $options] = SchemaCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm-object-schemas/v3/schemas',
            body: (object) $parsed,
            options: $options,
            convert: ObjectSchema::class,
        );
    }

    /**
     * @api
     *
     * Update the details for an existing object schema.
     *
     * @param bool $clearDescription
     * @param string $description
     * @param ObjectTypeDefinitionLabels $labels Singular and plural labels for the object. Used in CRM display.
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: ObjectTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Returns all object schemas that have been defined for your account.
     *
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function list(
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectSchemaNoPaging {
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
    ): CollectionResponseObjectSchemaNoPaging {
        [$parsed, $options] = SchemaListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm-object-schemas/v3/schemas',
            query: $parsed,
            options: $options,
            convert: CollectionResponseObjectSchemaNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Deletes a schema. Any existing records of this schema must be deleted **first**. Otherwise this call will fail.
     *
     * @param bool $archived whether to return only results that have been archived
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
        [$parsed, $options] = SchemaDeleteParams::parseRequest(
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
     * Removes an existing association from a schema.
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
        [$parsed, $options] = SchemaArchiveAssociationParams::parseRequest(
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
     * Defines a new association between the primary schema's object type and other object types.
     *
     * @param string $fromObjectTypeID ID of the primary object type to link from
     * @param string $toObjectTypeID ID of the target object type to link to
     * @param string $name a unique name for this association
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        $fromObjectTypeID,
        $toObjectTypeID,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): AssociationDefinition {
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
    ): AssociationDefinition {
        [$parsed, $options] = SchemaCreateAssociationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm-object-schemas/v3/schemas/%1$s/associations', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Returns an existing object schema.
     *
     * @throws APIException
     */
    public function read(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            options: $requestOptions,
            convert: ObjectSchema::class,
        );
    }
}
