<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<array{id: string, name?: string}> $inputs
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,array<string,mixed>>,
     *   name?: string,
     *   path?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,array<string,mixed>>,
     *   id?: string,
     *   name?: string,
     *   path?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,array<string,mixed>>,
     *   id?: string,
     *   name?: string,
     *   path?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;
}
