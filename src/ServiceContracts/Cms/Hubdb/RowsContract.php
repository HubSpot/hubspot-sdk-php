<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface RowsContract
{
    /**
     * @api
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
    ): HubDBTableRowV3;

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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
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
    ): Page;

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
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
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
    ): HubDBTableRowV3;

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
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
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
    public function deleteDraftRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): HubDBTableRowV3;

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
    ): HubDBTableRowV3;

    /**
     * @api
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
    ): HubDBTableRowV3;

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
    ): HubDBTableRowV3;

    /**
     * @api
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
    ): RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3;

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
        ?RequestOptions $requestOptions = null,
    ): RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3;

    /**
     * @api
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
    ): HubDBTableRowV3;

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
    ): HubDBTableRowV3;

    /**
     * @api
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
    ): HubDBTableRowV3;

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
    ): HubDBTableRowV3;
}
