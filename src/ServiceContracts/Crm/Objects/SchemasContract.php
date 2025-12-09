<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
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

interface SchemasContract
{
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
    ): ObjectSchema;

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
    ): ObjectsSchemasObjectTypeDefinition;

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
    ): SchemaListResponse;

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
    ): mixed;

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
    ): AssociationDefinition;

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
    ): mixed;

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
    ): ObjectSchema;
}
