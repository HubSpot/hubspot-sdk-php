<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\MediaBridge;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\MediaBridge\Batch\BatchGetParams\DataSensitivity;
use HubSpotSDK\Cms\MediaBridge\BatchResponseProperty;
use HubSpotSDK\Cms\MediaBridge\PropertyCreate;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\PropertyName;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\MediaBridge\BatchContract;

/**
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\Cms\MediaBridge\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
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
     * @param int $appID Path param
     * @param list<PropertyCreate|PropertyCreateShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $appID,
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
     * @param int $appID Path param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        int $appID,
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
     * @param int $appID Path param
     * @param bool $archived Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        int $appID,
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
