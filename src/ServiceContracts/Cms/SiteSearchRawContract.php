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

interface SiteSearchRawContract
{
    /**
     * @api
     *
     * @param string $contentID ID of the target document when searching for indexed properties
     * @param array<string,mixed>|SiteSearchGetIndexedDataParams $params
     *
     * @return BaseResponse<IndexedData>
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        array|SiteSearchGetIndexedDataParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SiteSearchSearchParams $params
     *
     * @return BaseResponse<PublicSearchResults>
     *
     * @throws APIException
     */
    public function search(
        array|SiteSearchSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
