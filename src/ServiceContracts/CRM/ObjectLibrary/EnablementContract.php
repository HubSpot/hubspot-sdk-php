<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\ObjectLibrary;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\CRM\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use HubspotSDK\RequestOptions;

interface EnablementContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): PortalObjectTypeEnablementPublicResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): ObjectTypeEnablementPublicResponse;
}
