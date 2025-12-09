<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\Rows\BatchContract;

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
     * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<array{id: string, name?: string}> $inputs
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cloneBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the published version of the specified table, given a set of row IDs.
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the draft version of the specified table, given a set of row IDs.
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraftBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes rows from the draft version of the table, given a set of row IDs. Maximum of 100 row IDs per call.
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->purgeBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PUT /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replaceBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PATCH /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
