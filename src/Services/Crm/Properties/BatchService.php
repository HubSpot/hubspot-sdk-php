<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Properties;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity;
use HubSpotSDK\Crm\Properties\BatchResponseProperty;
use HubSpotSDK\PropertyCreate;
use HubSpotSDK\PropertyName;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Properties\BatchContract;

/**
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\PropertyCreate
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
     * Create a batch of properties using the same rules as when creating an individual property.
     *
     * @param list<PropertyCreate|PropertyCreateShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
     *
     * @param list<PropertyName|PropertyNameShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a provided list of properties.
     *
     * @param string $objectType Path param
     * @param bool $archived Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param string $locale Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
        ?string $locale = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'dataSensitivity' => $dataSensitivity,
                'inputs' => $inputs,
                'locale' => $locale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
