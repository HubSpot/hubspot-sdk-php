<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\BatchResponseSimplePublicObject;
use HubspotSDK\CRM\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\CRM\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\SimplePublicObjectID;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInputForCreate> $inputs
     *
     * @throws APIException
     */
    public function create(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInput> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function archive(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<SimplePublicObjectID> $inputs
     * @param list<string> $properties key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory key-value pairs for setting properties for the new object and their histories
     * @param bool $archived whether to return only results that have been archived
     * @param string $idProperty When using a custom unique value property to retrieve records, the name of the property. Do not include this parameter if retrieving by record ID.
     *
     * @throws APIException
     */
    public function read(
        $inputs,
        $properties,
        $propertiesWithHistory,
        $archived = omit,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     *
     * @throws APIException
     */
    public function upsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject;
}
