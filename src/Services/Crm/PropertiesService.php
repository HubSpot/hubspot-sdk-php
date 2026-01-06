<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponseProperty;
use HubspotSDK\Crm\Properties\CreatedResponseProperty;
use HubspotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PropertiesContract;
use HubspotSDK\Services\Crm\Properties\BatchService;
use HubspotSDK\Services\Crm\Properties\GroupsService;

final class PropertiesService implements PropertiesContract
{
    /**
     * @api
     */
    public PropertiesRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public GroupsService $groups;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PropertiesRawService($client);
        $this->batch = new BatchService($client);
        $this->groups = new GroupsService($client);
    }

    /**
     * @api
     *
     * Create and return a copy of a new property for the specified object type.
     *
     * @param 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|FieldType $fieldType
     * @param 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|Type $type
     * @param 'highly_sensitive'|'non_sensitive'|'sensitive'|DataSensitivity $dataSensitivity
     * @param list<array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string,
     * }> $options
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        string|FieldType $fieldType,
        string $groupName,
        string $label,
        string $name,
        string|Type $type,
        ?string $calculationFormula = null,
        string|DataSensitivity|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of a property identified by { propertyName }. Provided fields will be overwritten.
     *
     * @param string $propertyName Path param:
     * @param string $objectType Path param:
     * @param string $calculationFormula body param: Represents a formula that is used to compute a calculated property
     * @param string $description body param: A description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Body param: Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     * @param 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|\HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType $fieldType body param: Controls how the property appears in HubSpot
     * @param bool $formField body param: Whether or not the property can be used in a HubSpot form
     * @param string $groupName body param: The name of the property group the property belongs to
     * @param bool $hidden body param: If true, the property won't be visible and can't be used in HubSpot
     * @param string $label body param: A human-readable property label that will be shown in HubSpot
     * @param list<array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string,
     * }> $options Body param: A list of valid options for the property
     * @param 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|\HubspotSDK\Crm\Properties\PropertyUpdateParams\Type $type body param: The data type of the property
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $description = null,
        ?int $displayOrder = null,
        string|\HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        string|\HubspotSDK\Crm\Properties\PropertyUpdateParams\Type|null $type = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read all existing properties for the specified object type and HubSpot account.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param 'highly_sensitive'|'non_sensitive'|'sensitive'|\HubspotSDK\Crm\Properties\PropertyListParams\DataSensitivity $dataSensitivity
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        bool $archived = false,
        string|\HubspotSDK\Crm\Properties\PropertyListParams\DataSensitivity $dataSensitivity = 'non_sensitive',
        ?string $locale = null,
        ?string $properties = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseProperty {
        $params = [
            'archived' => $archived,
            'dataSensitivity' => $dataSensitivity,
            'locale' => $locale,
            'properties' => $properties,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Move a property identified by {propertyName} to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['objectType' => $objectType];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a property identified by {propertyName}.
     *
     * @param string $propertyName Path param:
     * @param string $objectType Path param:
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param 'highly_sensitive'|'non_sensitive'|'sensitive'|\HubspotSDK\Crm\Properties\PropertyGetParams\DataSensitivity $dataSensitivity Query param:
     * @param string $locale Query param:
     * @param string $properties Query param:
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        string $objectType,
        bool $archived = false,
        string|\HubspotSDK\Crm\Properties\PropertyGetParams\DataSensitivity $dataSensitivity = 'non_sensitive',
        ?string $locale = null,
        ?string $properties = null,
        ?RequestOptions $requestOptions = null,
    ): Property {
        $params = [
            'objectType' => $objectType,
            'archived' => $archived,
            'dataSensitivity' => $dataSensitivity,
            'locale' => $locale,
            'properties' => $properties,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
