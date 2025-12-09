<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Property;
use HubspotSDK\PropertyCreate\DataSensitivity;
use HubspotSDK\PropertyCreate\FieldType;
use HubspotSDK\PropertyCreate\Type;
use HubspotSDK\RequestOptions;

interface PropertiesContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type to create the new property for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|\HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\FieldType $fieldType Body param:
     * @param string $groupName Body param:
     * @param string $label Body param:
     * @param string $name Body param:
     * @param 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|\HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\Type $type Body param:
     * @param string $calculationFormula Body param:
     * @param 'highly_sensitive'|'non_sensitive'|'sensitive'|\HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\DataSensitivity $dataSensitivity Body param:
     * @param string $description Body param:
     * @param int $displayOrder Body param:
     * @param bool $externalOptions Body param:
     * @param bool $formField Body param:
     * @param bool $hasUniqueValue Body param:
     * @param bool $hidden Body param:
     * @param list<array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string,
     * }> $options Body param:
     * @param string $referencedObjectType Body param:
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $appID,
        string|\HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\FieldType $fieldType,
        string $groupName,
        string $label,
        string $name,
        string|\HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\Type $type,
        ?string $calculationFormula = null,
        string|\HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\DataSensitivity|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to update
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType path param: The object type for the property to be updated
     * @param string $calculationFormula Body param:
     * @param string $description Body param:
     * @param int $displayOrder Body param:
     * @param 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType $fieldType Body param:
     * @param bool $formField Body param:
     * @param string $groupName Body param:
     * @param bool $hasUniqueValue Body param:
     * @param bool $hidden Body param:
     * @param string $label Body param:
     * @param list<array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string,
     * }> $options Body param:
     * @param 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type $type Body param:
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
        string|\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        string|\HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type|null $type = null,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $objectType path param: The specific object type to get the details for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties query param: Filter the response to the specified properties
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        int $appID,
        bool $archived = false,
        ?string $properties = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyNoPaging;

    /**
     * @api
     *
     * @param string $propertyName the name of the property to delete
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType the object type for the property to delete
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        int $appID,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType path param: The type of object to create the properties for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param list<array{
     *   fieldType: 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|FieldType,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|Type,
     *   calculationFormula?: string,
     *   dataSensitivity?: 'highly_sensitive'|'non_sensitive'|'sensitive'|DataSensitivity,
     *   description?: string,
     *   displayOrder?: int,
     *   externalOptions?: bool,
     *   formField?: bool,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     *   referencedObjectType?: string,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        int $appID,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param string $objectType path param: The object type for the specified properties to be archived
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param list<array{name: string}> $inputs Body param:
     *
     * @throws APIException
     */
    public function deleteBatch(
        string $objectType,
        int $appID,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to get the details for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType path param: The object type for the property
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties query param: Limit the response to only include the specified properties
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        int $appID,
        string $objectType,
        bool $archived = false,
        ?string $properties = null,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param string $objectType path param: The object type to get the properties for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $archived Body param:
     * @param 'highly_sensitive'|'non_sensitive'|'sensitive'|\HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity $dataSensitivity Body param:
     * @param list<array{name: string}> $inputs Body param:
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        int $appID,
        bool $archived,
        string|\HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity $dataSensitivity,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;
}
