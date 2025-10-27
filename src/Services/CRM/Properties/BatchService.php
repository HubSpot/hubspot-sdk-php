<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Properties;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\Batch\BatchCreateParams;
use HubspotSDK\CRM\Properties\Batch\BatchDeleteParams;
use HubspotSDK\CRM\Properties\Batch\BatchReadParams;
use HubspotSDK\CRM\Properties\Batch\BatchReadParams\DataSensitivity;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Properties\BatchContract;

use const HubspotSDK\Core\OMIT as omit;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of properties using the same rules as when creating an individual property.
     *
     * @param list<PropertyCreate> $inputs
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty {
        $params = ['inputs' => $inputs];

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
    ): BatchResponseProperty {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/create', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
     *
     * @param list<PropertyName> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/archive', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a provided list of properties.
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
        [$parsed, $options] = BatchReadParams::parseRequest(
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
