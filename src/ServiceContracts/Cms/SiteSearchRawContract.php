<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\Cms\SiteSearch\IndexedData;
use HubSpotSDK\Cms\SiteSearch\PublicSearchResults;
use HubSpotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
