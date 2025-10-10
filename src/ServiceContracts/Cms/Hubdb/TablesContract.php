<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\CollectionResponseWithTotalHubDBTableV3ForwardPaging;
use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface TablesContract
{
    /**
     * @api
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
    ): HubDBTableV3;

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
    ): HubDBTableV3;

    /**
     * @api
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function archive(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string;

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
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string;

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
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
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
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
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
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
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
    ): ImportResult;

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
        ?RequestOptions $requestOptions = null,
    ): ImportResult;

    /**
     * @api
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
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging;

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
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging;

    /**
     * @api
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
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
    ): HubDBTableV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;
}
