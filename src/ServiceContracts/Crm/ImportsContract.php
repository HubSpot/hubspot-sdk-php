<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
        ?string $files = null,
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
