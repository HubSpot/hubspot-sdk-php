<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\NumberDisplayHint;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\OptionSortStrategy;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\TextDisplayHint;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\Type;
use HubspotSDK\Crm\Objects\Schemas\SchemaListResponse;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\SchemasContract;

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
     * @param list<string> $associatedObjects associations defined for this object type
     * @param array{
     *   plural?: string, singular?: string
     * }|ObjectTypeDefinitionLabels $labels
     * @param string $name A unique name for this object. For internal use only.
     * @param list<array{
     *   fieldType: string,
     *   label: string,
     *   name: string,
     *   type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'string'|Type,
     *   description?: string,
     *   displayOrder?: int,
     *   formField?: bool,
     *   groupName?: string,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   numberDisplayHint?: 'currency'|'duration'|'formatted'|'percentage'|'probability'|'unformatted'|NumberDisplayHint,
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     *   optionSortStrategy?: 'ALPHABETICAL'|'DISPLAY_ORDER'|OptionSortStrategy,
     *   referencedObjectType?: string,
     *   searchableInGlobalSearch?: bool,
     *   showCurrencySymbol?: bool,
     *   textDisplayHint?: 'domain_name'|'email'|'ip_address'|'multi_line'|'phone_number'|'physical_address'|'postal_code'|'unformatted_single_line'|TextDisplayHint,
     * }> $properties Properties defined for this object type
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function create(
        array $associatedObjects,
        array|ObjectTypeDefinitionLabels $labels,
        string $name,
        array $properties,
        array $requiredProperties,
        ?string $description = null,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        ?RequestOptions $requestOptions = null,
    ): ObjectSchema {
        $params = Util::removeNulls(
            [
                'associatedObjects' => $associatedObjects,
                'labels' => $labels,
                'name' => $name,
                'properties' => $properties,
                'requiredProperties' => $requiredProperties,
                'description' => $description,
                'primaryDisplayProperty' => $primaryDisplayProperty,
                'searchableProperties' => $searchableProperties,
                'secondaryDisplayProperties' => $secondaryDisplayProperties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     * @param array{
     *   plural?: string, singular?: string
     * }|ObjectTypeDefinitionLabels $labels
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
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
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function list(
        bool $archived = false,
        ?RequestOptions $requestOptions = null
    ): SchemaListResponse {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        bool $archived = false,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
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
     * @param string $associationIdentifier unique ID of the association to remove
     * @param string $objectType fully qualified name or object type ID of your schema
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAssociation($associationIdentifier, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $objectType fully qualified name or object type ID of your schema
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, requestOptions: $requestOptions);

        return $response->parse();
    }
}
