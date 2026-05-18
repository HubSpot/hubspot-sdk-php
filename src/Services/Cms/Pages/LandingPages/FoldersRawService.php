<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\BatchResponseContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolderVersion;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderBatchGetParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderCreateFoldersParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderCreateParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderDeleteFoldersParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderDeleteParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderGetParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderGetRevisionParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderListParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderListRevisionsParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderRestoreRevisionParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderUpdateFoldersParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages\FoldersRawContract;

/**
 * @phpstan-import-type ContentFolderShape from \HubSpotSDK\Cms\Pages\ContentFolder
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class FoldersRawService implements FoldersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new folder for landing pages.
     *
     * @param array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: \DateTimeInterface,
     * }|FolderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/folders',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Partially update a landing page folder, specified by the folder ID. You only need to specify the details values that you are modifying.
     *
     * @param string $objectID Path param
     * @param array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: \DateTimeInterface,
     *   archived?: bool,
     * }|FolderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|FolderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/pages/2026-03/landing-pages/folders/%1$s', $objectID],
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Get the list of Landing Page Folders. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|FolderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function list(
        array|FolderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/landing-pages/folders',
            query: $parsed,
            options: $options,
            convert: ContentFolder::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a landing page folder, specified by its ID.
     *
     * @param array{archived?: bool}|FolderDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|FolderDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/pages/2026-03/landing-pages/folders/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of landing page folders as identified in the request body.
     *
     * @param array{inputs: list<string>, archived?: bool}|FolderBatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function batchGet(
        array|FolderBatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderBatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/folders/batch/read',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Create a batch of folders as detailed in the request body.
     *
     * @param array{
     *   inputs: list<ContentFolder|ContentFolderShape>
     * }|FolderCreateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFolders(
        array|FolderCreateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderCreateFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/folders/batch/create',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Delete a batch of folders as specified in the request body.
     *
     * @param array{inputs: list<string>}|FolderDeleteFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolders(
        array|FolderDeleteFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderDeleteFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/folders/batch/archive',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a landing page folder, specified by its ID.
     *
     * @param array{archived?: bool, property?: string}|FolderGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|FolderGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/pages/2026-03/landing-pages/folders/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a previous version of a folder, specified by the folder ID and revision ID.
     *
     * @param array{objectID: string}|FolderGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolderVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|FolderGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/pages/2026-03/landing-pages/folders/%1$s/revisions/%2$s',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: ContentFolderVersion::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a landing page folder.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|FolderListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolderVersion>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|FolderListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/pages/2026-03/landing-pages/folders/%1$s/revisions', $objectID,
            ],
            query: $parsed,
            options: $options,
            convert: ContentFolderVersion::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a landing page folder and restores it.
     *
     * @param array{objectID: string}|FolderRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|FolderRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/pages/2026-03/landing-pages/folders/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of landing page folders as specified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|FolderUpdateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFolders(
        array|FolderUpdateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/folders/batch/update',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }
}
