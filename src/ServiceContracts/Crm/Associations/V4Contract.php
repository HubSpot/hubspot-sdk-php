<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\V4MergeParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\RequestOptions;

interface V4Contract
{
    /**
     * @api
     *
     * @param array<mixed>|V4MergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        string $objectType,
        array|V4MergeParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;
}
