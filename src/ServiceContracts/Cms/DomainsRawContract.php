<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Cms\Domains\DomainListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface DomainsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|DomainListParams $params
     *
     * @return BaseResponse<Page<Domain>>
     *
     * @throws APIException
     */
    public function list(
        array|DomainListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $domainID the unique ID of the domain
     *
     * @return BaseResponse<Domain>
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
