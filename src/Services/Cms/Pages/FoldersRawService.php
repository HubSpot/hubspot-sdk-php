<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\ContentFolderVersion;
use HubspotSDK\Cms\Pages\Folders\FolderCreateFolderParams;
use HubspotSDK\Cms\Pages\Folders\FolderDeleteFolderParams;
use HubspotSDK\Cms\Pages\Folders\FolderGetFolderParams;
use HubspotSDK\Cms\Pages\Folders\FolderGetFolderRevisionParams;
use HubspotSDK\Cms\Pages\Folders\FolderGetFoldersBatchParams;
use HubspotSDK\Cms\Pages\Folders\FolderListFolderRevisionsParams;
use HubspotSDK\Cms\Pages\Folders\FolderListFoldersParams;
use HubspotSDK\Cms\Pages\Folders\FolderRestoreFolderRevisionParams;
use HubspotSDK\Cms\Pages\Folders\FolderUpdateFolderParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\FoldersRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * }|FolderCreateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function createFolder(
        array|FolderCreateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderCreateFolderParams::parseRequest(
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
     * Delete a landing page folder, specified by its ID.
     *
     * @param array{archived?: bool}|FolderDeleteFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        array|FolderDeleteFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderDeleteFolderParams::parseRequest(
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
     * Retrieve a landing page folder, specified by its ID.
     *
     * @param array{archived?: bool, property?: string}|FolderGetFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        array|FolderGetFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetFolderParams::parseRequest(
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
     * @param array{objectID: string}|FolderGetFolderRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolderVersion>
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        array|FolderGetFolderRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetFolderRevisionParams::parseRequest(
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
     * Retrieve a batch of landing page folders as identified in the request body.
     *
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|FolderGetFoldersBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        array|FolderGetFoldersBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetFoldersBatchParams::parseRequest(
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
     * Retrieves all the previous versions of a landing page folder.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|FolderListFolderRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolderVersion>>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        array|FolderListFolderRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderListFolderRevisionsParams::parseRequest(
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
     * }|FolderListFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function listFolders(
        array|FolderListFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderListFoldersParams::parseRequest(
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
     * Takes a specified version of a landing page folder and restores it.
     *
     * @param array{objectID: string}|FolderRestoreFolderRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        array|FolderRestoreFolderRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderRestoreFolderRevisionParams::parseRequest(
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
     * }|FolderUpdateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        array|FolderUpdateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateFolderParams::parseRequest(
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
}
