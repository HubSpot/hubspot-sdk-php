<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\SitePages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\BatchResponsePage;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchCreateSitePagesParams;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchDeleteSitePagesParams;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchGetSitePagesParams;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchUpdateSitePagesParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\SitePages\BatchRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Delete a batch of website pages as specified in the request body. Note that this is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
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
