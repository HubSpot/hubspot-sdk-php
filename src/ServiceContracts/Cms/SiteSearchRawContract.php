<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SiteSearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SiteSearchGetIndexedDataParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IndexedData>
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        array|SiteSearchGetIndexedDataParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SiteSearchSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSearchResults>
     *
     * @throws APIException
     */
    public function search(
        array|SiteSearchSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
