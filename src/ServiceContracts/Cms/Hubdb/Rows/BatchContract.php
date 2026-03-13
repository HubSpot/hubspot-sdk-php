<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type HubDBTableRowBatchCloneRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type HubDBTableRowV3BatchUpdateRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<HubDBTableRowV3BatchUpdateRequest|HubDBTableRowV3BatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<HubDBTableRowV3BatchUpdateRequest|HubDBTableRowV3BatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;
}
