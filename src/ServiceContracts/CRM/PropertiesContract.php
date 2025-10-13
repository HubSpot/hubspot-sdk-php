<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\BatchResponseProperty;
use HubspotSDK\CRM\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\CRM\Properties\OptionInput;
use HubspotSDK\CRM\Properties\PropertyName;
use HubspotSDK\CRM\Properties\PropertyReadParams\DataSensitivity;
use HubspotSDK\CRM\Properties\PropertyUpdateParams\FieldType;
use HubspotSDK\CRM\Properties\PropertyUpdateParams\Type;
use HubspotSDK\CRM\Property;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PropertiesContract
{
    /**
     * @api
     *
     * @param string $label a human-readable label that will be shown in HubSpot
     * @param string $name the internal property group name, which must be used when referencing the property group via the API
     * @param int $displayOrder Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $label,
        $name,
        $displayOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponsePropertyGroup;

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
    ): CreatedResponsePropertyGroup;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $calculationFormula represents a formula that is used to compute a calculated property
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     * @param FieldType|value-of<FieldType> $fieldType controls how the property appears in HubSpot
     * @param bool $formField whether or not the property can be used in a HubSpot form
     * @param string $groupName the name of the property group the property belongs to
     * @param bool $hidden if true, the property won't be visible and can't be used in HubSpot
     * @param string $label a human-readable property label that will be shown in HubSpot
     * @param list<OptionInput> $options a list of valid options for the property
     * @param Type|value-of<Type> $type the data type of the property
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
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroup;

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
    public function getByName(
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
    public function getByNameRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param bool $archived
     * @param list<PropertyName> $inputs
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     *
     * @throws APIException
     */
    public function read(
        string $objectType,
        $archived,
        $inputs,
        $dataSensitivity = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;
}
