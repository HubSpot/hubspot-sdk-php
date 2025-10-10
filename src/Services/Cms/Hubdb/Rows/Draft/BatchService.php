<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb\Rows\Draft;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchCloneBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchCreateBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchPurgeBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchReadBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchReadDraftBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchReplaceBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Draft\Batch\BatchUpdateBatchParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\Rows\Draft\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Clone rows in batch
     *
     * @param list<HubDBTableRowBatchCloneRequest> $inputs
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->cloneBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchCloneBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/clone', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Create rows in batch
     *
     * @param list<HubDBTableRowV3Request> $inputs
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->createBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchCreateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/create', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes rows
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->purgeBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchPurgeBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/purge', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a set of rows
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function readBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->readBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchReadBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get a set of rows from draft table
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function readDraftBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->readDraftBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchReadDraftBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Replace rows in batch in draft table
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->replaceBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchReplaceBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/replace', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Update rows in batch in draft table
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->updateBatchRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchUpdateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/update', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }
}
