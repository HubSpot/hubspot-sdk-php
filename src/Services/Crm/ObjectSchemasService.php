<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate;
use HubspotSDK\Events\AssociationDefinition;
use HubspotSDK\ObjectSchema;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ObjectSchemasContract;
use HubspotSDK\Services\Crm\ObjectSchemas\BatchService;

/**
 * @phpstan-import-type ObjectTypePropertyCreateShape from \HubspotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ObjectSchemasService implements ObjectSchemasContract
{
    /**
     * @api
     */
    public ObjectSchemasRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ObjectSchemasRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * @param list<string> $associatedObjects associations defined for this object type
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
     * @param string $name A unique name for this object. For internal use only.
     * @param list<ObjectTypePropertyCreate|ObjectTypePropertyCreateShape> $properties properties defined for this object type
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        bool $allowsSensitiveProperties,
        array $associatedObjects,
        ObjectTypeDefinitionLabels|array $labels,
        string $name,
        array $properties,
        array $requiredProperties,
        array $searchableProperties,
        array $secondaryDisplayProperties,
        ?string $description = null,
        ?string $primaryDisplayProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectSchema {
        $params = Util::removeNulls(
            [
                'allowsSensitiveProperties' => $allowsSensitiveProperties,
                'associatedObjects' => $associatedObjects,
                'labels' => $labels,
                'name' => $name,
                'properties' => $properties,
                'requiredProperties' => $requiredProperties,
                'searchableProperties' => $searchableProperties,
                'secondaryDisplayProperties' => $secondaryDisplayProperties,
                'description' => $description,
                'primaryDisplayProperty' => $primaryDisplayProperty,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        bool $clearDescription,
        ?bool $allowsSensitiveProperties = null,
        ?string $description = null,
        ObjectTypeDefinitionLabels|array|null $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectTypeDefinition {
        $params = Util::removeNulls(
            [
                'clearDescription' => $clearDescription,
                'allowsSensitiveProperties' => $allowsSensitiveProperties,
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
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        bool $archived = false,
        bool $includeAssociationDefinitions = true,
        bool $includeAuditMetadata = true,
        bool $includePropertyDefinitions = true,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseObjectSchemaNoPaging {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includeAssociationDefinitions' => $includeAssociationDefinitions,
                'includeAuditMetadata' => $includeAuditMetadata,
                'includePropertyDefinitions' => $includePropertyDefinitions,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        bool $archived = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssociationDefinition {
        $params = Util::removeNulls(
            [
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAssociation($associationIdentifier, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        bool $includeAssociationDefinitions = true,
        bool $includeAuditMetadata = true,
        bool $includePropertyDefinitions = true,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectSchema {
        $params = Util::removeNulls(
            [
                'includeAssociationDefinitions' => $includeAssociationDefinitions,
                'includeAuditMetadata' => $includeAuditMetadata,
                'includePropertyDefinitions' => $includePropertyDefinitions,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
