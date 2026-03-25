<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Subscriptions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Subscriptions\BatchContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
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
     * Create multiple subscription objects in a single batch operation, allowing for efficient data entry and management.
     *
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch update multiple subscription objects in a single batch operation, allowing for efficient modifications of CRM subscription records.
     *
     * @param list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a batch of subscription objects by providing their IDs in the request body.
     *
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a batch of commerce subscriptions by their IDs, including specified properties and their histories.
     *
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs Body param
     * @param list<string> $properties body param: Key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory body param: Key-value pairs for setting properties for the new object and their histories
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $idProperty Body param: When using a custom unique value property to retrieve records, the name of the property. Do not include this parameter if retrieving by record ID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        bool $archived = false,
        ?string $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(
            [
                'inputs' => $inputs,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
                'archived' => $archived,
                'idProperty' => $idProperty,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows you to perform a batch upsert operation on subscription objects, which will either update existing records or create new ones if they do not already exist. The operation returns the status, timestamps, and a list of successfully processed objects.
     *
     * @param list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
