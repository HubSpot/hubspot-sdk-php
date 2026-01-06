<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\ObjectLibrary;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\Crm\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use HubspotSDK\RequestOptions;

interface EnablementRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<PortalObjectTypeEnablementPublicResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;

    /**
     * @api
     *
     * @param string $objectTypeID objectTypeId for the object type in question
     *
     * @return BaseResponse<ObjectTypeEnablementPublicResponse>
     *
     * @throws APIException
     */
    public function get(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
