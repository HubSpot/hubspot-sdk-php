<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\CollectionResponsePublicAssociationDefinitionNoPaging;
use HubspotSDK\RequestOptions;

interface SchemaContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionNoPaging;
}
