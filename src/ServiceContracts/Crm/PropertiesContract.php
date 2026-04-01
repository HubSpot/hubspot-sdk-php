<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponsePropertyNoPaging;
use HubspotSDK\Crm\Properties\Property;
use HubspotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubspotSDK\OptionInput;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity indicates the sensitivity level of the property, with options: highly_sensitive, non_sensitive, or sensitive
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property to be displayed after any positive values.
     * @param bool $externalOptions Applicable only for 'enumeration' type properties.  Should be set to true in conjunction with a 'referencedObjectType' of 'OWNER'.  Otherwise false.
     * @param bool $formField whether or not the property can be used in a HubSpot form
     * @param bool $hasUniqueValue Whether or not the property's value must be unique. Once set, this can't be changed.
     * @param bool $hidden if true, the property won't be visible and can't be used in HubSpot
     * @param list<OptionInput|OptionInputShape> $options A list of valid options for the property. This field is required for enumerated properties.
     * @param string $referencedObjectType should be set to 'OWNER' when 'externalOptions' is true, which causes the property to dynamically pull option values from the current HubSpot users
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        FieldType|string $fieldType,
        string $groupName,
        string $label,
        string $name,
        Type|string $type,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
        ?bool $showCurrencySymbol = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param string $objectType Path param
     * @param string $calculationFormula body param: Represents a formula that is used to compute a calculated property
     * @param string $currencyPropertyName Body param
     * @param string $description body param: A description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Body param: Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     * @param \HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType|value-of<\HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType> $fieldType body param: Controls how the property appears in HubSpot
     * @param bool $formField body param: Whether or not the property can be used in a HubSpot form
     * @param string $groupName body param: The name of the property group the property belongs to
     * @param bool $hidden body param: If true, the property won't be visible and can't be used in HubSpot
     * @param string $label body param: A human-readable property label that will be shown in HubSpot
     * @param list<OptionInput|OptionInputShape> $options body param: A list of valid options for the property
     * @param bool $showCurrencySymbol Body param
     * @param \HubspotSDK\Crm\Properties\PropertyUpdateParams\Type|value-of<\HubspotSDK\Crm\Properties\PropertyUpdateParams\Type> $type body param: The data type of the property
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        ?string $description = null,
        ?int $displayOrder = null,
        \HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        ?bool $showCurrencySymbol = null,
        \HubspotSDK\Crm\Properties\PropertyUpdateParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param \HubspotSDK\Crm\Properties\PropertyListParams\DataSensitivity|value-of<\HubspotSDK\Crm\Properties\PropertyListParams\DataSensitivity> $dataSensitivity
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        bool $archived = false,
        \HubspotSDK\Crm\Properties\PropertyListParams\DataSensitivity|string $dataSensitivity = 'non_sensitive',
        ?string $locale = null,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param string $objectType Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param \HubspotSDK\Crm\Properties\PropertyGetParams\DataSensitivity|value-of<\HubspotSDK\Crm\Properties\PropertyGetParams\DataSensitivity> $dataSensitivity Query param
     * @param string $locale Query param
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        string $objectType,
        bool $archived = false,
        \HubspotSDK\Crm\Properties\PropertyGetParams\DataSensitivity|string $dataSensitivity = 'non_sensitive',
        ?string $locale = null,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;
}
