<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\Schema\CollectionResponsePublicAssociationDefinitionNoPaging;
use HubspotSDK\RequestOptions;

interface SchemaContract
{
    /**
     * @api
     *
     * @param string $fromObjectType
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionNoPaging;
}
