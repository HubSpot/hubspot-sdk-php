<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\Batch\BatchCreateFoldersParams;
use HubspotSDK\Cms\Pages\Batch\BatchCreateLandingPagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchCreateSitePagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchDeleteFoldersParams;
use HubspotSDK\Cms\Pages\Batch\BatchDeleteLandingPagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchDeleteSitePagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchGetLandingPagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchGetSitePagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchUpdateFoldersParams;
use HubspotSDK\Cms\Pages\Batch\BatchUpdateLandingPagesParams;
use HubspotSDK\Cms\Pages\Batch\BatchUpdateSitePagesParams;
use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\BatchRawContract;

/**
 * @phpstan-import-type ContentFolderShape from \HubspotSDK\Cms\Pages\ContentFolder
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of folders as detailed in the request body.
     *
     * @param array{
     *   inputs: list<ContentFolder|ContentFolderShape>
     * }|BatchCreateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFolders(
        array|BatchCreateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateFoldersParams::parseRequest(
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
     * Create a batch of landing pages as detailed in the request body.
     *
     * @param array{inputs: list<mixed>}|BatchCreateLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createLandingPages(
        array|BatchCreateLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateLandingPagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/batch/create',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Create a batch of website pages as specified in the request body.
     *
     * @param array{inputs: list<mixed>}|BatchCreateSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createSitePages(
        array|BatchCreateSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateSitePagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/batch/create',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Delete a batch of folders as specified in the request body.
     *
     * @param array{inputs: list<string>}|BatchDeleteFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolders(
        array|BatchDeleteFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteFoldersParams::parseRequest(
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
     * Delete landing pages specified by ID in the request body. Note: this is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
     *
     * @param array{inputs: list<string>}|BatchDeleteLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLandingPages(
        array|BatchDeleteLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteLandingPagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/batch/archive',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a batch of website pages as specified in the request body. Note: this is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
     *
     * @param array{inputs: list<string>}|BatchDeleteSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSitePages(
        array|BatchDeleteSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteSitePagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/batch/archive',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of landing pages as specified in the request body.
     *
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|BatchGetLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getLandingPages(
        array|BatchGetLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetLandingPagesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/batch/read',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of website pages as specified in the request body.
     *
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|BatchGetSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getSitePages(
        array|BatchGetSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetSitePagesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/batch/read',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of landing page folders as specified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|BatchUpdateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFolders(
        array|BatchUpdateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateFoldersParams::parseRequest(
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

    /**
     * @api
     *
     * Update a batch of landing pages as specified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|BatchUpdateLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateLandingPages(
        array|BatchUpdateLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateLandingPagesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/landing-pages/batch/update',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of website pages as specified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|BatchUpdateSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateSitePages(
        array|BatchUpdateSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateSitePagesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/batch/update',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }
}
