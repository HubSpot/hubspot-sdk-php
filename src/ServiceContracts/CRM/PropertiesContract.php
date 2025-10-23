<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\CollectionResponseProperty;
use HubspotSDK\CRM\Properties\CreatedResponseProperty;
use HubspotSDK\CRM\Properties\OptionInput;
use HubspotSDK\CRM\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\CRM\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\CRM\Properties\PropertyCreateParams\Type;
use HubspotSDK\CRM\Property;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PropertiesContract
{
    /**
     * @api
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
     * @param \HubspotSDK\CRM\Properties\PropertyUpdateParams\FieldType|value-of<\HubspotSDK\CRM\Properties\PropertyUpdateParams\FieldType> $fieldType controls how the property appears in HubSpot
     * @param bool $formField whether or not the property can be used in a HubSpot form
     * @param string $groupName the name of the property group the property belongs to
     * @param bool $hidden if true, the property won't be visible and can't be used in HubSpot
     * @param string $label a human-readable property label that will be shown in HubSpot
     * @param list<OptionInput> $options a list of valid options for the property
     * @param \HubspotSDK\CRM\Properties\PropertyUpdateParams\Type|value-of<\HubspotSDK\CRM\Properties\PropertyUpdateParams\Type> $type the data type of the property
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
