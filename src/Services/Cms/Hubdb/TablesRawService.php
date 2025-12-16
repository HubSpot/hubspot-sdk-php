<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\ColumnRequest\Type;
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
use HubspotSDK\Cms\Hubdb\Tables\TableListDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListParams;
use HubspotSDK\Cms\Hubdb\Tables\TablePublishDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableResetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUnpublishParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUpdateDraftParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Option;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\TablesRawContract;

final class TablesRawService implements TablesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
     *
     * @param array{
     *   allowChildTables: bool,
     *   allowPublicAPIAccess: bool,
     *   columns: list<array{
     *     id: int,
     *     label: string,
     *     name: string,
     *     options: list<array<string,mixed>|Option>,
     *     type: 'BOOLEAN'|'CODE'|'COMPOSITE'|'CTA'|'CURRENCY'|'DATE'|'DATETIME'|'EMBED'|'FILE'|'FOREIGN_ID'|'HUBSPOT_VIDEO'|'IMAGE'|'JSON'|'LOCATION'|'MULTISELECT'|'NULL'|'NUMBER'|'RICHTEXT'|'SELECT'|'TEXT'|'URL'|'VIDEO'|Type,
     *     foreignColumnID?: int,
     *     foreignTableID?: int,
     *     maxNumberOfCharacters?: int,
     *     maxNumberOfOptions?: int,
     *   }>,
     *   dynamicMetaTags: array<string,int>,
     *   enableChildTablePages: bool,
     *   label: string,
     *   name: string,
     *   useForPages: bool,
     * }|TableCreateParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function create(
        array|TableCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TableCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Returns the details for the published version of each table defined in an account, including column definitions.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   contentType?: string,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   isGetLocalizedSchema?: bool,
     *   limit?: int,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|TableListParams $params
     *
     * @return BaseResponse<Page<HubDBTableV3>>
     *
     * @throws APIException
     */
    public function list(
        array|TableListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TableListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
     *
     * @param string $tableIDOrName the ID or name of the table to archive
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * Clone an existing HubDB table. The `newName` and `newLabel` of the new table can be sent as JSON in the request body. This will create the cloned table as a draft.
     *
     * @param string $tableIDOrName the ID or name of the table to clone
     * @param array{
     *   copyRows: bool, isHubspotDefined: bool, newLabel?: string, newName?: string
     * }|TableCloneDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        array|TableCloneDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableCloneDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Delete a specific version of a table
     *
     * @param int $versionID the ID of the specific version of the table to delete
     * @param array{tableIDOrName: string}|TableDeleteVersionParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        array|TableDeleteVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableDeleteVersionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
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
     * Exports the published version of a table in a specified format.
     *
     * @param string $tableIDOrName the ID or name of the table to export
     * @param array{format?: string}|TableExportParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        array|TableExportParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableExportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Exports the draft version of a table to CSV / EXCEL format.
     *
     * @param string $tableIDOrName the ID or name of the table to export
     * @param array{format?: string}|TableExportDraftParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        array|TableExportDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableExportDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Returns the details for the published version of the specified table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access. To do so, you'll need to include the HubSpot account ID in a `portalId` query parameter.
     *
     * @param string $tableIDOrName the ID or name of the table to return
     * @param array{
     *   archived?: bool, includeForeignIDs?: bool, isGetLocalizedSchema?: bool
     * }|TableGetParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function get(
        string $tableIDOrName,
        array|TableGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s', $tableIDOrName],
            query: Util::array_transform_keys(
                $parsed,
                ['includeForeignIDs' => 'includeForeignIds']
            ),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * @param string $tableIDOrName the ID or name of the table to return
     * @param array{
     *   archived?: bool, includeForeignIDs?: bool, isGetLocalizedSchema?: bool
     * }|TableGetDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function getDraft(
        string $tableIDOrName,
        array|TableGetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableGetDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/draft', $tableIDOrName],
            query: Util::array_transform_keys(
                $parsed,
                ['includeForeignIDs' => 'includeForeignIds']
            ),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Import the contents of a CSV file into an existing HubDB table. The data will always be imported into the draft version of the table. Use the `/publish` endpoint to push these changes to the published version.
     * This endpoint takes a multi-part POST request. The first part will be a set of JSON-formatted options for the import and you can specify this with the name as `config`.  The second part will be the CSV file you want to import and you can specify this with the name as `file`. Refer the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#importing-tables) to check the details and format of the JSON-formatted options for the import.
     *
     * @param string $tableIDOrName the ID of the destination table where data will be imported
     * @param array{config?: string, file?: string}|TableImportDraftParams $params
     *
     * @return BaseResponse<ImportResult>
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        array|TableImportDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableImportDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Returns the details for each draft table defined in the specified account, including column definitions.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   contentType?: string,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   isGetLocalizedSchema?: bool,
     *   limit?: int,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|TableListDraftParams $params
     *
     * @return BaseResponse<Page<HubDBTableV3>>
     *
     * @throws APIException
     */
    public function listDraft(
        array|TableListDraftParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TableListDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/hubdb/tables/draft',
            query: $parsed,
            options: $options,
            convert: HubDBTableV3::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
     *
     * @param string $tableIDOrName the ID or name of the table to publish
     * @param array{includeForeignIDs?: bool}|TablePublishDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        array|TablePublishDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TablePublishDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/publish', $tableIDOrName],
            query: Util::array_transform_keys(
                $parsed,
                ['includeForeignIDs' => 'includeForeignIds']
            ),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Replaces the data in the draft version of the table with values from the published version. Any unpublished changes in the draft will be lost after this call is made.
     *
     * @param string $tableIDOrName the ID or name of the table to reset
     * @param array{includeForeignIDs?: bool}|TableResetDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        array|TableResetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableResetDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/reset', $tableIDOrName],
            query: Util::array_transform_keys(
                $parsed,
                ['includeForeignIDs' => 'includeForeignIds']
            ),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Unpublishes the table, meaning any website pages using data from the table will not render any data.
     *
     * @param string $tableIDOrName the ID or name of the table to publish
     * @param array{includeForeignIDs?: bool}|TableUnpublishParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        array|TableUnpublishParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableUnpublishParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/unpublish', $tableIDOrName],
            query: Util::array_transform_keys(
                $parsed,
                ['includeForeignIDs' => 'includeForeignIds']
            ),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Update an existing HubDB table. You can use this endpoint to add or remove columns to the table as well as restore an archived table. Tables updated using the endpoint will only modify the draft verion of the table. Use the `/publish` endpoint to push all the changes to the published version. To restore a table, include the query parameter `archived=true` and `"archived": false` in the json body.
     * **Note:** You need to include all the columns in the input when you are adding/removing/updating a column. If you do not include an already existing column in the request, it will be deleted.
     *
     * @param string $tableIDOrName path param: The ID or name of the table to update
     * @param array{
     *   allowChildTables: bool,
     *   allowPublicAPIAccess: bool,
     *   columns: list<array{
     *     id: int,
     *     label: string,
     *     name: string,
     *     options: list<array<string,mixed>|Option>,
     *     type: 'BOOLEAN'|'CODE'|'COMPOSITE'|'CTA'|'CURRENCY'|'DATE'|'DATETIME'|'EMBED'|'FILE'|'FOREIGN_ID'|'HUBSPOT_VIDEO'|'IMAGE'|'JSON'|'LOCATION'|'MULTISELECT'|'NULL'|'NUMBER'|'RICHTEXT'|'SELECT'|'TEXT'|'URL'|'VIDEO'|Type,
     *     foreignColumnID?: int,
     *     foreignTableID?: int,
     *     maxNumberOfCharacters?: int,
     *     maxNumberOfOptions?: int,
     *   }>,
     *   dynamicMetaTags: array<string,int>,
     *   enableChildTablePages: bool,
     *   label: string,
     *   name: string,
     *   useForPages: bool,
     *   archived?: bool,
     *   includeForeignIDs?: bool,
     *   isGetLocalizedSchema?: bool,
     * }|TableUpdateDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $tableIDOrName,
        array|TableUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TableUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(
            ['archived', 'includeForeignIDs', 'isGetLocalizedSchema']
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/hubdb/tables/%1$s/draft', $tableIDOrName],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['includeForeignIDs' => 'includeForeignIds'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: HubDBTableV3::class,
        );
    }
}
