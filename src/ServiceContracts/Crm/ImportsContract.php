<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Imports\ImportCreateParams;
use HubspotSDK\Crm\Imports\ImportListErrorsParams;
use HubspotSDK\Crm\Imports\ImportListParams;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ImportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ImportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ImportCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicImportResponse;

    /**
     * @api
     *
     * @param array<mixed>|ImportListParams $params
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ImportListParams $params,
        ?RequestOptions $requestOptions = null
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
     * @param array<mixed>|ImportListErrorsParams $params
     *
     * @return Page<PublicImportError>
     *
     * @throws APIException
     */
    public function listErrors(
        int $importID,
        array|ImportListErrorsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
