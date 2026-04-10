<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects\PostalMail;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert;
use HubSpotSDK\Crm\Objects\SimplePublicObjectID;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type SimplePublicObjectIDShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectID
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject;
}
