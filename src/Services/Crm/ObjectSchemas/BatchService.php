<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\ObjectSchemas;

use HubspotSDK\Client;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ObjectSchemas\BatchContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

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
    ): CollectionResponseObjectSchemaNoPaging {
        $params = Util::removeNulls(
            [
                'includeAssociationDefinitions' => $includeAssociationDefinitions,
                'includeAuditMetadata' => $includeAuditMetadata,
                'includePropertyDefinitions' => $includePropertyDefinitions,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
