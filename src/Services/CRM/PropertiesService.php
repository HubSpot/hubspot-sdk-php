<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\BatchResponseProperty;
use HubspotSDK\CRM\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CRMPropertiesOptionInput;
use HubspotSDK\CRM\Properties\PropertyCreateParams;
use HubspotSDK\CRM\Properties\PropertyDeleteParams;
use HubspotSDK\CRM\Properties\PropertyGetByNameParams;
use HubspotSDK\CRM\Properties\PropertyName;
use HubspotSDK\CRM\Properties\PropertyReadParams;
use HubspotSDK\CRM\Properties\PropertyReadParams\DataSensitivity;
use HubspotSDK\CRM\Properties\PropertyUpdateParams;
use HubspotSDK\CRM\Properties\PropertyUpdateParams\FieldType;
use HubspotSDK\CRM\Properties\PropertyUpdateParams\Type;
use HubspotSDK\CRM\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\PropertiesContract;

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
     * Create a property group
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
    ): CreatedResponsePropertyGroup {
        $params = [
            'label' => $label, 'name' => $name, 'displayOrder' => $displayOrder,
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
    ): CreatedResponsePropertyGroup {
        [$parsed, $options] = PropertyCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/groups', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponsePropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Update a property
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
    ): Property {
        $params = [
            'objectType' => $objectType,
            'calculationFormula' => $calculationFormula,
            'displayOrder' => $displayOrder,
            'fieldType' => $fieldType,
            'formField' => $formField,
            'groupName' => $groupName,
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
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/properties/%1$s/%2$s', $objectType, $propertyName],
            body: (object) array_diff_key($parsed, ['objectType']),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Read all property groups
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroup {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/groups', $objectType],
            options: $requestOptions,
            convert: CollectionResponsePropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Archive a property
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['objectType' => $objectType];

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
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/properties/%1$s/%2$s', $objectType, $propertyName],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a property
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
    ): Property {
        $params = [
            'objectType' => $objectType,
            'archived' => $archived,
            'properties' => $properties,
        ];

        return $this->getByNameRaw($propertyName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = PropertyGetByNameParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/%2$s', $objectType, $propertyName],
            query: $parsed,
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Read a batch of properties
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
    ): BatchResponseProperty {
        $params = [
            'archived' => $archived,
            'inputs' => $inputs,
            'dataSensitivity' => $dataSensitivity,
        ];

        return $this->readRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty {
        [$parsed, $options] = PropertyReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/read', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }
}
