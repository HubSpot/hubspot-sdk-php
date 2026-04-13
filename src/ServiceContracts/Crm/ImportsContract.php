<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Crm\Imports\PublicImportError;
use HubSpotSDK\Crm\Imports\PublicImportResponse;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ImportsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string|FileParam|null $files = null,
        ?string $importRequest = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicImportResponse;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        int $importID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $importID,
        RequestOptions|array|null $requestOptions = null
    ): PublicImportResponse;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicImportError>
     *
     * @throws APIException
     */
    public function listErrors(
        int $importID,
        ?string $after = null,
        ?bool $includeErrorMessage = null,
        ?bool $includeRowData = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;
}
