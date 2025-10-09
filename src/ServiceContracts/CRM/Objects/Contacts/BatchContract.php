<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects\Contacts;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\Objects\SimplePublicObjectID;
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
    public function delete(
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
    public function deleteRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<SimplePublicObjectID> $inputs
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     * @param bool $archived
     * @param string $idProperty
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
