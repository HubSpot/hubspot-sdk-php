<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\ObjectSchemas;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param bool $includeAssociationDefinitions indicates whether to include association definitions in the response
     * @param bool $includeAuditMetadata indicates whether to include audit metadata in the response
     * @param bool $includePropertyDefinitions indicates whether to include property definitions in the response
     * @param list<string> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        bool $includeAssociationDefinitions,
        bool $includeAuditMetadata,
        bool $includePropertyDefinitions,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseObjectSchemaNoPaging;
}
