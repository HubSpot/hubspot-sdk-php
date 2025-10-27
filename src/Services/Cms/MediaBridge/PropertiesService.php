<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyArchiveBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\Type;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyDeleteParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyListParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\OptionInput;
use HubspotSDK\Property;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\PropertiesContract;

use const HubspotSDK\Core\OMIT as omit;

final class PropertiesService implements PropertiesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new property for the specified media type
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
    ): Property {
        $params = [
            'appID' => $appID,
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

        return $this->createRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = PropertyCreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/v1/%1$s/properties/%2$s', $appID, $objectType],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Update an existing property for an object type.
     *
     * @param string $appID
     * @param string $objectType
     * @param string $calculationFormula
     * @param string $description
     * @param int $displayOrder
     * @param PropertyUpdateParams\FieldType|value-of<PropertyUpdateParams\FieldType> $fieldType
     * @param bool $formField
     * @param string $groupName
     * @param bool $hasUniqueValue
     * @param bool $hidden
     * @param string $label
     * @param list<OptionInput> $options
     * @param PropertyUpdateParams\Type|value-of<PropertyUpdateParams\Type> $type
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
    ): Property {
        $params = [
            'appID' => $appID,
            'objectType' => $objectType,
            'calculationFormula' => $calculationFormula,
            'description' => $description,
            'displayOrder' => $displayOrder,
            'fieldType' => $fieldType,
            'formField' => $formField,
            'groupName' => $groupName,
            'hasUniqueValue' => $hasUniqueValue,
            'hidden' => $hidden,
            'label' => $label,
            'options' => $options,
            'type' => $type,
        ];

        return $this->updateRaw($propertyName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = PropertyUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appID', 'objectType'])
            ),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Get the existing properties defined for a media object type.
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyNoPaging {
        $params = ['appID' => $appID];

        return $this->listRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyNoPaging {
        [$parsed, $options] = PropertyListParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/properties/%2$s', $appID, $objectType],
            options: $options,
            convert: CollectionResponsePropertyNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing property for an object type.
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
    ): mixed {
        $params = ['appID' => $appID, 'objectType' => $objectType];

        return $this->deleteRaw($propertyName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PropertyDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Archive a batch of existing properties for the specified types.
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
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID, 'inputs' => $inputs];

        return $this->archiveBatchRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PropertyArchiveBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/batch/archive',
                $appID,
                $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a batch of properties of the specified object type.
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
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty {
        $params = ['appID' => $appID, 'inputs' => $inputs];

        return $this->createBatchRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty {
        [$parsed, $options] = PropertyCreateBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/batch/create', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Get the details for an existing property by name.
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
    ): Property {
        $params = ['appID' => $appID, 'objectType' => $objectType];

        return $this->getRaw($propertyName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = PropertyGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Get the details for a batch of properties for a specified object type.
     *
     * @param string $appID
     * @param bool $archived
     * @param list<PropertyName> $inputs
     * @param PropertyGetBatchParams\DataSensitivity|value-of<PropertyGetBatchParams\DataSensitivity> $dataSensitivity
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
    ): BatchResponseProperty {
        $params = [
            'appID' => $appID,
            'archived' => $archived,
            'inputs' => $inputs,
            'dataSensitivity' => $dataSensitivity,
        ];

        return $this->getBatchRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty {
        [$parsed, $options] = PropertyGetBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/batch/read', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }
}
