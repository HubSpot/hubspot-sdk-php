<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponseProperty;
use HubspotSDK\Crm\Properties\CreatedResponseProperty;
use HubspotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubspotSDK\OptionInput;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PropertiesContract
{
    /**
     * @api
     *
     * @param FieldType|value-of<FieldType> $fieldType
     * @param string $groupName
     * @param string $label
     * @param string $name
     * @param Type|value-of<Type> $type
     * @param string $calculationFormula
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param string $description
     * @param int $displayOrder
     * @param bool $externalOptions
     * @param bool $formField
     * @param bool $hasUniqueValue
     * @param bool $hidden
     * @param list<OptionInput> $options
     * @param string $referencedObjectType
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
    ): CreatedResponseProperty;

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
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseProperty;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $calculationFormula represents a formula that is used to compute a calculated property
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     * @param \HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType|value-of<\HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType> $fieldType controls how the property appears in HubSpot
     * @param bool $formField whether or not the property can be used in a HubSpot form
     * @param string $groupName the name of the property group the property belongs to
     * @param bool $hidden if true, the property won't be visible and can't be used in HubSpot
     * @param string $label a human-readable property label that will be shown in HubSpot
     * @param list<OptionInput> $options a list of valid options for the property
     * @param \HubspotSDK\Crm\Properties\PropertyUpdateParams\Type|value-of<\HubspotSDK\Crm\Properties\PropertyUpdateParams\Type> $type the data type of the property
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
    ): Property;

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
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
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
    ): CollectionResponseProperty;

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
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseProperty;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
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
    ): Property;

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
        ?RequestOptions $requestOptions = null,
    ): Property;
}
