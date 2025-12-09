<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponseProperty;
use HubspotSDK\Crm\Properties\CreatedResponseProperty;
use HubspotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

interface PropertiesContract
{
    /**
     * @api
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
    ): CreatedResponseProperty;

    /**
     * @api
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
    ): Property;

    /**
     * @api
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
    ): CollectionResponseProperty;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
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
    ): Property;
}
