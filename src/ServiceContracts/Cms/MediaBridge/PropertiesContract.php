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

/**
 * @phpstan-import-type PropertyCreateShape from \HubspotSDK\PropertyCreate
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 */
interface PropertiesContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type to create the new property for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param FieldType|value-of<FieldType> $fieldType Body param
     * @param string $groupName Body param
     * @param string $label Body param
     * @param string $name Body param
     * @param Type|value-of<Type> $type Body param
     * @param string $calculationFormula Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param string $description Body param
     * @param int $displayOrder Body param
     * @param bool $externalOptions Body param
     * @param bool $formField Body param
     * @param bool $hasUniqueValue Body param
     * @param bool $hidden Body param
     * @param list<OptionInput|OptionInputShape> $options Body param
     * @param string $referencedObjectType Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $appID,
        FieldType|string $fieldType,
        string $groupName,
        string $label,
        string $name,
        Type|string $type,
        ?string $calculationFormula = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to update
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType path param: The object type for the property to be updated
     * @param string $calculationFormula Body param
     * @param string $description Body param
     * @param int $displayOrder Body param
     * @param \HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType|value-of<\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType> $fieldType Body param
     * @param bool $formField Body param
     * @param string $groupName Body param
     * @param bool $hasUniqueValue Body param
     * @param bool $hidden Body param
     * @param string $label Body param
     * @param list<OptionInput|OptionInputShape> $options Body param
     * @param \HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type|value-of<\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type> $type Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        int $appID,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $description = null,
        ?int $displayOrder = null,
        \HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        \HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $objectType path param: The specific object type to get the details for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties query param: Filter the response to the specified properties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        int $appID,
        bool $archived = false,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyNoPaging;

    /**
     * @api
     *
     * @param string $propertyName the name of the property to delete
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType the object type for the property to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType path param: The type of object to create the properties for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param list<PropertyCreate|PropertyCreateShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param string $objectType path param: The object type for the specified properties to be archived
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        string $objectType,
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to get the details for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType path param: The object type for the property
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties query param: Limit the response to only include the specified properties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        int $appID,
        string $objectType,
        bool $archived = false,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $objectType path param: The object type to get the properties for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $archived Body param
     * @param \HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity|value-of<\HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity> $dataSensitivity Body param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        int $appID,
        bool $archived,
        \HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity|string $dataSensitivity,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty;
}
