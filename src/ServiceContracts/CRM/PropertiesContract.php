<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\CRMProperty;
use HubspotSDK\CRM\Properties\CRMPropertiesBatchResponseProperty;
use HubspotSDK\CRM\Properties\CRMPropertiesCollectionResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CRMPropertiesCreatedResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CRMPropertiesOptionInput;
use HubspotSDK\CRM\Properties\CRMPropertiesPropertyName;
use HubspotSDK\CRM\Properties\PropertyReadParams\DataSensitivity;
use HubspotSDK\CRM\Properties\PropertyUpdateParams\FieldType;
use HubspotSDK\CRM\Properties\PropertyUpdateParams\Type;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PropertiesContract
{
    /**
     * @api
     *
     * @param string $label
     * @param string $name
     * @param int $displayOrder
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $label,
        $name,
        $displayOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMPropertiesCreatedResponsePropertyGroup;

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
    ): CRMPropertiesCreatedResponsePropertyGroup;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $calculationFormula
     * @param int $displayOrder
     * @param FieldType|value-of<FieldType> $fieldType
     * @param bool $formField
     * @param string $groupName
     * @param bool $hidden
     * @param string $label
     * @param list<CRMPropertiesOptionInput> $options
     * @param Type|value-of<Type> $type
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        $objectType,
        $calculationFormula = omit,
        $displayOrder = omit,
        $fieldType = omit,
        $formField = omit,
        $groupName = omit,
        $hidden = omit,
        $label = omit,
        $options = omit,
        $type = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMProperty;

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
    ): CRMProperty;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CRMPropertiesCollectionResponsePropertyGroup;

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
     * @param bool $archived
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
    ): CRMProperty;

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
    ): CRMProperty;

    /**
     * @api
     *
     * @param bool $archived
     * @param list<CRMPropertiesPropertyName> $inputs
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
    ): CRMPropertiesBatchResponseProperty;

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
    ): CRMPropertiesBatchResponseProperty;
}
