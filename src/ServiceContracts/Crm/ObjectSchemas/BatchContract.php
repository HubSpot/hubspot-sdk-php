<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\ObjectSchemas;

use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
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
