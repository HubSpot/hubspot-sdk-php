<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb\Rows\Draft;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<HubDBTableRowBatchCloneRequest> $inputs
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3Request> $inputs
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
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
    public function purgeBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function readBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function readDraftBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readDraftBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;
}
