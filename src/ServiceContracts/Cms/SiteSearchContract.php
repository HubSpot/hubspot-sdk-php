<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface SiteSearchContract
{
    /**
     * @api
     *
     * @param array<mixed>|SiteSearchGetIndexedDataParams $params
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        array|SiteSearchGetIndexedDataParams $params,
        ?RequestOptions $requestOptions = null,
    ): IndexedData;

    /**
     * @api
     *
     * @param array<mixed>|SiteSearchSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|SiteSearchSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSearchResults;
}
