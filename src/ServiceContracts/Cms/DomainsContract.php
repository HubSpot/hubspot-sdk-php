<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Cms\Domains\DomainListParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface DomainsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DomainListParams $params
     *
     * @return Page<Domain>
     *
     * @throws APIException
     */
    public function list(
        array|DomainListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        ?RequestOptions $requestOptions = null
    ): Domain;
}
