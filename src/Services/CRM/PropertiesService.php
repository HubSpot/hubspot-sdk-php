<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\CollectionResponseProperty;
use HubspotSDK\CRM\Properties\CreatedResponseProperty;
use HubspotSDK\CRM\Properties\OptionInput;
use HubspotSDK\CRM\Properties\PropertyCreateParams;
use HubspotSDK\CRM\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\CRM\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\CRM\Properties\PropertyCreateParams\Type;
use HubspotSDK\CRM\Properties\PropertyDeleteParams;
use HubspotSDK\CRM\Properties\PropertyGetParams;
use HubspotSDK\CRM\Properties\PropertyListParams;
use HubspotSDK\CRM\Properties\PropertyUpdateParams;
use HubspotSDK\CRM\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\PropertiesContract;
use HubspotSDK\Services\CRM\Properties\BatchService;
use HubspotSDK\Services\CRM\Properties\GroupsService;

use const HubspotSDK\Core\OMIT as omit;

final class PropertiesService implements PropertiesContract
{
    /**
     * @@api
     */
    public BatchService $batch;

    /**
     * @@api
     */
    public GroupsService $groups;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
        $this->groups = new GroupsService($client);
    }

    /**
     * @api
     *
     * Create and return a copy of a new property for the specified object type.
     *
     * @param FieldType|value-of<FieldType> $fieldType controls how the property appears in HubSpot
     * @param string $groupName the name of the property group the property belongs to
     * @param string $label a human-readable property label that will be shown in HubSpot
     * @param string $name the internal property name, which must be used when referencing the property via the API
     * @param Type|value-of<Type> $type the data type of the property
     * @param string $calculationFormula represents a formula that is used to compute a calculated property
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property to be displayed after any positive values.
     * @param bool $externalOptions Applicable only for 'enumeration' type properties.  Should be set to true in conjunction with a 'referencedObjectType' of 'OWNER'.  Otherwise false.
     * @param bool $formField whether or not the property can be used in a HubSpot form
     * @param bool $hasUniqueValue Whether or not the property's value must be unique. Once set, this can't be changed.
     * @param bool $hidden If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
     * @param list<OptionInput> $options A list of valid options for the property. This field is required for enumerated properties.
     * @param string $referencedObjectType should be set to 'OWNER' when 'externalOptions' is true, which causes the property to dynamically pull option values from the current HubSpot users
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $fieldType,
        $groupName,
        $label,
        $name,
        $type,
        $calculationFormula = omit,
        $dataSensitivity = omit,
        $description = omit,
        $displayOrder = omit,
        $externalOptions = omit,
        $formField = omit,
        $hasUniqueValue = omit,
        $hidden = omit,
        $options = omit,
        $referencedObjectType = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseProperty {
        $params = [
            'fieldType' => $fieldType,
            'groupName' => $groupName,
            'label' => $label,
            'name' => $name,
            'type' => $type,
            'calculationFormula' => $calculationFormula,
            'dataSensitivity' => $dataSensitivity,
            'description' => $description,
            'displayOrder' => $displayOrder,
            'externalOptions' => $externalOptions,
            'formField' => $formField,
            'hasUniqueValue' => $hasUniqueValue,
            'hidden' => $hidden,
            'options' => $options,
            'referencedObjectType' => $referencedObjectType,
        ];

        return $this->createRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseProperty {
        [$parsed, $options] = PropertyCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of a property identified by { propertyName }. Provided fields will be overwritten.
     *
     * @param string $objectType
     * @param string $calculationFormula represents a formula that is used to compute a calculated property
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     * @param PropertyUpdateParams\FieldType|value-of<PropertyUpdateParams\FieldType> $fieldType controls how the property appears in HubSpot
     * @param bool $formField whether or not the property can be used in a HubSpot form
     * @param string $groupName the name of the property group the property belongs to
     * @param bool $hidden if true, the property won't be visible and can't be used in HubSpot
     * @param string $label a human-readable property label that will be shown in HubSpot
     * @param list<OptionInput> $options a list of valid options for the property
     * @param PropertyUpdateParams\Type|value-of<PropertyUpdateParams\Type> $type the data type of the property
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        $objectType,
        $calculationFormula = omit,
        $description = omit,
        $displayOrder = omit,
        $fieldType = omit,
        $formField = omit,
        $groupName = omit,
        $hidden = omit,
        $label = omit,
        $options = omit,
        $type = omit,
        ?RequestOptions $requestOptions = null,
    ): Property {
        $params = [
            'objectType' => $objectType,
            'calculationFormula' => $calculationFormula,
            'description' => $description,
            'displayOrder' => $displayOrder,
            'fieldType' => $fieldType,
            'formField' => $formField,
            'groupName' => $groupName,
            'hidden' => $hidden,
            'label' => $label,
            'options' => $options,
            'type' => $type,
        ];

        return $this->updateRaw($propertyName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = PropertyUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/properties/%1$s/%2$s', $objectType, $propertyName],
            body: (object) array_diff_key($parsed, ['objectType']),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Read all existing properties for the specified object type and HubSpot account.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param string $properties
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        $archived = omit,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseProperty {
        $params = ['archived' => $archived, 'properties' => $properties];

        return $this->listRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseProperty {
        [$parsed, $options] = PropertyListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: CollectionResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Move a property identified by {propertyName} to the recycling bin.
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['objectType' => $objectType];

        return $this->deleteRaw($propertyName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PropertyDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/properties/%1$s/%2$s', $objectType, $propertyName],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a property identified by {propertyName}.
     *
     * @param string $objectType
     * @param bool $archived whether to return only results that have been archived
     * @param string $properties
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        $objectType,
        $archived = omit,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): Property {
        $params = [
            'objectType' => $objectType,
            'archived' => $archived,
            'properties' => $properties,
        ];

        return $this->getRaw($propertyName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = PropertyGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/%2$s', $objectType, $propertyName],
            query: $parsed,
            options: $options,
            convert: Property::class,
        );
    }
}
