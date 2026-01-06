<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Owners\OwnerGetParams;
use HubspotSDK\Crm\Owners\OwnerListParams;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface OwnersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|OwnerListParams $params
     *
     * @return BaseResponse<Page<PublicOwner>>
     *
     * @throws APIException
     */
    public function list(
        array|OwnerListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|OwnerGetParams $params
     *
     * @return BaseResponse<PublicOwner>
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        array|OwnerGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
