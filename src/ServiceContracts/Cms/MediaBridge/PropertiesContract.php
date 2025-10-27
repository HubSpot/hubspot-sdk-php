<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\Type;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\OptionInput;
use HubspotSDK\Property;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PropertiesContract
{
    /**
     * @api
     *
     * @param string $appID
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
        $appID,
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
    ): Property;

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
    ): Property;

    /**
     * @api
     *
     * @param string $appID
     * @param string $objectType
     * @param string $calculationFormula
     * @param string $description
     * @param int $displayOrder
     * @param \HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType|value-of<\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType> $fieldType
     * @param bool $formField
     * @param string $groupName
     * @param bool $hasUniqueValue
     * @param bool $hidden
     * @param string $label
     * @param list<OptionInput> $options
     * @param \HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type|value-of<\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type> $type
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        $appID,
        $objectType,
        $calculationFormula = omit,
        $description = omit,
        $displayOrder = omit,
        $fieldType = omit,
        $formField = omit,
        $groupName = omit,
        $hasUniqueValue = omit,
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
     * @param string $appID
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyNoPaging;

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
    ): CollectionResponsePropertyNoPaging;

    /**
     * @api
     *
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        $appID,
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
     * @param string $appID
     * @param list<PropertyName> $inputs
     *
     * @throws APIException
     */
    public function archiveBatch(
        string $objectType,
        $appID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveBatchRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $appID
     * @param list<PropertyCreate> $inputs
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        $appID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createBatchRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        $appID,
        $objectType,
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

    /**
     * @api
     *
     * @param string $appID
     * @param bool $archived
     * @param list<PropertyName> $inputs
     * @param \HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity|value-of<\HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity> $dataSensitivity
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        $appID,
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
    public function getBatchRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;
}
