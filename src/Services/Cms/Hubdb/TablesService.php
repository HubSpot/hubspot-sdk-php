<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\CollectionResponseWithTotalHubDBTableV3ForwardPaging;
use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Cms\Hubdb\Tables\TableCloneDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableCreateParams;
use HubspotSDK\Cms\Hubdb\Tables\TableDeleteVersionParams;
use HubspotSDK\Cms\Hubdb\Tables\TableExportDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableExportParams;
use HubspotSDK\Cms\Hubdb\Tables\TableGetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableGetParams;
use HubspotSDK\Cms\Hubdb\Tables\TableImportDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListDraftsParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListParams;
use HubspotSDK\Cms\Hubdb\Tables\TablePublishDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableResetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUnpublishParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUpdateDraftParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\TablesContract;

use const HubspotSDK\Core\OMIT as omit;

final class TablesService implements TablesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new table
     *
     * @param string $label
     * @param string $name
     * @param bool $allowChildTables
     * @param bool $allowPublicAPIAccess
     * @param list<ColumnRequest> $columns
     * @param array<string, int> $dynamicMetaTags
     * @param bool $enableChildTablePages
     * @param bool $useForPages
     *
     * @throws APIException
     */
    public function create(
        $label,
        $name,
        $allowChildTables = omit,
        $allowPublicAPIAccess = omit,
        $columns = omit,
        $dynamicMetaTags = omit,
        $enableChildTablePages = omit,
        $useForPages = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = [
            'label' => $label,
            'name' => $name,
            'allowChildTables' => $allowChildTables,
            'allowPublicAPIAccess' => $allowPublicAPIAccess,
            'columns' => $columns,
            'dynamicMetaTags' => $dynamicMetaTags,
            'enableChildTablePages' => $enableChildTablePages,
            'useForPages' => $useForPages,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): HubDBTableV3 {
        [$parsed, $options] = TableCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/hubdb/tables',
            body: (object) $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get all published tables
     *
     * @param string $after
     * @param bool $archived
     * @param string $contentType
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param bool $isGetLocalizedSchema
     * @param int $limit
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $contentType = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $isGetLocalizedSchema = omit,
        $limit = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'contentType' => $contentType,
            'createdAfter' => $createdAfter,
            'createdAt' => $createdAt,
            'createdBefore' => $createdBefore,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
            'limit' => $limit,
            'sort' => $sort,
            'updatedAfter' => $updatedAfter,
            'updatedAt' => $updatedAt,
            'updatedBefore' => $updatedBefore,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = TableListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/hubdb/tables',
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archive a table
     *
     * @throws APIException
     */
    public function archive(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/hubdb/tables/%1$s', $tableIDOrName],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Clone a table
     *
     * @param bool $copyRows
     * @param bool $isHubspotDefined
     * @param string $newLabel
     * @param string $newName
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        $copyRows,
        $isHubspotDefined,
        $newLabel = omit,
        $newName = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = [
            'copyRows' => $copyRows,
            'isHubspotDefined' => $isHubspotDefined,
            'newLabel' => $newLabel,
            'newName' => $newName,
        ];

        return $this->cloneDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableCloneDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/clone', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Delete a table version
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['tableIDOrName' => $tableIDOrName];

        return $this->deleteVersionRaw($versionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteVersionRaw(
        int $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TableDeleteVersionParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'cms/v3/hubdb/tables/%1$s/versions/%2$s', $tableIDOrName, $versionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Export a published version of a table
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['format' => $format];

        return $this->exportRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function exportRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = TableExportParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/export', $tableIDOrName],
            query: $parsed,
            headers: ['Accept' => 'application/vnd.ms-excel'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Export a draft table
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['format' => $format];

        return $this->exportDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function exportDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = TableExportDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/draft/export', $tableIDOrName],
            query: $parsed,
            headers: ['Accept' => 'application/vnd.ms-excel'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Get details of a published table
     *
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     *
     * @throws APIException
     */
    public function get(
        string $tableIDOrName,
        $archived = omit,
        $includeForeignIDs = omit,
        $isGetLocalizedSchema = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = [
            'archived' => $archived,
            'includeForeignIDs' => $includeForeignIDs,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
        ];

        return $this->getRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get details for a draft table
     *
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     *
     * @throws APIException
     */
    public function getDraft(
        string $tableIDOrName,
        $archived = omit,
        $includeForeignIDs = omit,
        $isGetLocalizedSchema = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = [
            'archived' => $archived,
            'includeForeignIDs' => $includeForeignIDs,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
        ];

        return $this->getDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableGetDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/draft', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Import data into draft table
     *
     * @param string $config
     * @param string $file
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        $config = omit,
        $file = omit,
        ?RequestOptions $requestOptions = null,
    ): ImportResult {
        $params = ['config' => $config, 'file' => $file];

        return $this->importDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function importDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ImportResult {
        [$parsed, $options] = TableImportDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/import', $tableIDOrName],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: ImportResult::class,
        );
    }

    /**
     * @api
     *
     * Return all draft tables
     *
     * @param string $after
     * @param bool $archived
     * @param string $contentType
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param bool $isGetLocalizedSchema
     * @param int $limit
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @throws APIException
     */
    public function listDrafts(
        $after = omit,
        $archived = omit,
        $contentType = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $isGetLocalizedSchema = omit,
        $limit = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'contentType' => $contentType,
            'createdAfter' => $createdAfter,
            'createdAt' => $createdAt,
            'createdBefore' => $createdBefore,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
            'limit' => $limit,
            'sort' => $sort,
            'updatedAfter' => $updatedAfter,
            'updatedAt' => $updatedAt,
            'updatedBefore' => $updatedBefore,
        ];

        return $this->listDraftsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listDraftsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging {
        [$parsed, $options] = TableListDraftsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/hubdb/tables/draft',
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalHubDBTableV3ForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Publish a table from draft
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->publishDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function publishDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TablePublishDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/publish', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Reset a draft table
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->resetDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function resetDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableResetDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/reset', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Unpublish a table
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->unpublishRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unpublishRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableUnpublishParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/unpublish', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Update an existing table
     *
     * @param string $label
     * @param string $name
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     * @param bool $allowChildTables
     * @param bool $allowPublicAPIAccess
     * @param list<ColumnRequest> $columns
     * @param array<string, int> $dynamicMetaTags
     * @param bool $enableChildTablePages
     * @param bool $useForPages
     *
     * @throws APIException
     */
    public function updateDraft(
        string $tableIDOrName,
        $label,
        $name,
        $archived = omit,
        $includeForeignIDs = omit,
        $isGetLocalizedSchema = omit,
        $allowChildTables = omit,
        $allowPublicAPIAccess = omit,
        $columns = omit,
        $dynamicMetaTags = omit,
        $enableChildTablePages = omit,
        $useForPages = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = [
            'label' => $label,
            'name' => $name,
            'archived' => $archived,
            'includeForeignIDs' => $includeForeignIDs,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
            'allowChildTables' => $allowChildTables,
            'allowPublicAPIAccess' => $allowPublicAPIAccess,
            'columns' => $columns,
            'dynamicMetaTags' => $dynamicMetaTags,
            'enableChildTablePages' => $enableChildTablePages,
            'useForPages' => $useForPages,
        ];

        return $this->updateDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableUpdateDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(
            ['archived', 'includeForeignIds', 'isGetLocalizedSchema']
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/hubdb/tables/%1$s/draft', $tableIDOrName],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }
}
