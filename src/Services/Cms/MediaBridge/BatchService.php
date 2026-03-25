<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\Batch\BatchGetParams\DataSensitivity;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\BatchContract;

/**
 * @phpstan-import-type PropertyCreateShape from \HubspotSDK\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Create a batch of properties of the specified object type.
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param list<PropertyCreate|PropertyCreateShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        string $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty {
        $params = Util::removeNulls(['appID' => $appID, 'inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a batch of existing properties for the specified types.
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        string $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['appID' => $appID, 'inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for a batch of properties for a specified object type.
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param bool $archived Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        string $appID,
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'archived' => $archived,
                'dataSensitivity' => $dataSensitivity,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
