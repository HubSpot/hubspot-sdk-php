<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ImportsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?string $files = null,
        ?string $importRequest = null,
        ?RequestOptions $requestOptions = null,
    ): PublicImportResponse;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function cancel(
        int $importID,
        ?RequestOptions $requestOptions = null
    ): ActionResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $importID,
        ?RequestOptions $requestOptions = null
    ): PublicImportResponse;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeErrorMessage set to True to receive a message explaining the error
     * @param bool $includeRowData set to True to receive the data values for the errored row
     * @param int $limit the maximum number of results to display per page
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
        ?RequestOptions $requestOptions = null,
    ): Page;
}
