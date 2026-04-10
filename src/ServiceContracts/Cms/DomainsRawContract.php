<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\Cms\Domains\Domain;
use HubSpotSDK\Cms\Domains\DomainListParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface DomainsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DomainListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Domain>>
     *
     * @throws APIException
     */
    public function list(
        array|DomainListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Domain>
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
