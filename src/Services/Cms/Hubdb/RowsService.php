<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\Rows\RowCloneDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowCreateParams;
use HubspotSDK\Cms\Hubdb\Rows\RowDeleteDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetParams;
use HubspotSDK\Cms\Hubdb\Rows\RowListDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowListParams;
use HubspotSDK\Cms\Hubdb\Rows\RowReplaceDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowUpdateDraftParams;
use HubspotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\RowsContract;
use HubspotSDK\Services\Cms\Hubdb\Rows\DraftService;

use const HubspotSDK\Core\OMIT as omit;

final class RowsService implements RowsContract
{
    /**
     * @@api
     */
    public DraftService $draft;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->draft = new DraftService($client);
    }

    /**
     * @api
     *
     * Add a new row to a table
     *
     * @param array<string, mixed> $values
     * @param int $childTableID
     * @param int $displayIndex
     * @param string $name
     * @param string $path
     *
     * @throws APIException
     */
    public function create(
        string $tableIDOrName,
        $values,
        $childTableID = omit,
        $displayIndex = omit,
        $name = omit,
        $path = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = [
            'values' => $values,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'name' => $name,
            'path' => $path,
        ];

        return $this->createRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3 {
        [$parsed, $options] = RowCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get rows for a table
     *
     * @param string $after
     * @param bool $archived
     * @param int $limit
     * @param int $offset
     * @param list<string> $properties
     * @param list<string> $sort
     *
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function list(
        string $tableIDOrName,
        $after = omit,
        $archived = omit,
        $limit = omit,
        $offset = omit,
        $properties = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'limit' => $limit,
            'offset' => $offset,
            'properties' => $properties,
            'sort' => $sort,
        ];

        return $this->listRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function listRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = RowListParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/rows', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: 'mixed',
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Clone a row
     *
     * @param string $tableIDOrName
     * @param string $name
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        $tableIDOrName,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'name' => $name];

        return $this->cloneDraftRaw($rowID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneDraftRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3 {
        [$parsed, $options] = RowCloneDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft/clone', $tableIDOrName, $rowID,
            ],
            query: $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a row
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['tableIDOrName' => $tableIDOrName];

        return $this->deleteDraftRaw($rowID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteDraftRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = RowDeleteDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a table row
     *
     * @param string $tableIDOrName
     * @param bool $archived
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        $tableIDOrName,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'archived' => $archived];

        return $this->getRaw($rowID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3 {
        [$parsed, $options] = RowGetParams::parseRequest($params, $requestOptions);
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/rows/%2$s', $tableIDOrName, $rowID],
            query: $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get a row from the draft table
     *
     * @param string $tableIDOrName
     * @param bool $archived
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        $tableIDOrName,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'archived' => $archived];

        return $this->getDraftRaw($rowID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDraftRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3 {
        [$parsed, $options] = RowGetDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            query: $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get rows from draft table
     *
     * @param string $after
     * @param bool $archived
     * @param int $limit
     * @param int $offset
     * @param list<string> $properties
     * @param list<string> $sort
     *
     * @throws APIException
     */
    public function listDraft(
        string $tableIDOrName,
        $after = omit,
        $archived = omit,
        $limit = omit,
        $offset = omit,
        $properties = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3 {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'limit' => $limit,
            'offset' => $offset,
            'properties' => $properties,
            'sort' => $sort,
        ];

        return $this->listDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3 {
        [$parsed, $options] = RowListDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Replaces an existing row
     *
     * @param string $tableIDOrName
     * @param array<string, mixed> $values
     * @param int $childTableID
     * @param int $displayIndex
     * @param string $name
     * @param string $path
     *
     * @throws APIException
     */
    public function replaceDraft(
        string $rowID,
        $tableIDOrName,
        $values,
        $childTableID = omit,
        $displayIndex = omit,
        $name = omit,
        $path = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = [
            'tableIDOrName' => $tableIDOrName,
            'values' => $values,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'name' => $name,
            'path' => $path,
        ];

        return $this->replaceDraftRaw($rowID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceDraftRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3 {
        [$parsed, $options] = RowReplaceDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, ['tableIDOrName']),
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Updates an existing row
     *
     * @param string $tableIDOrName
     * @param array<string, mixed> $values
     * @param int $childTableID
     * @param int $displayIndex
     * @param string $name
     * @param string $path
     *
     * @throws APIException
     */
    public function updateDraft(
        string $rowID,
        $tableIDOrName,
        $values,
        $childTableID = omit,
        $displayIndex = omit,
        $name = omit,
        $path = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = [
            'tableIDOrName' => $tableIDOrName,
            'values' => $values,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'name' => $name,
            'path' => $path,
        ];

        return $this->updateDraftRaw($rowID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3 {
        [$parsed, $options] = RowUpdateDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, ['tableIDOrName']),
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }
}
