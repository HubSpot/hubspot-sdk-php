<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\MappingContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MappingService implements MappingContract
{
    /**
     * @api
     */
    public MappingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MappingRawService($client);
    }

    /**
     * @api
     *
     * This API allows translation of a batch of legacy list id's to list id's. This allows for a maximum of 10,000 id's. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
     *
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): PublicBatchMigrationMapping {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchCreateIDMapping(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API allows translation of legacy list id to list id. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
     *
     * @param string $legacyListID the legacy list id from lists v1 API
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getIDMapping(
        ?string $legacyListID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicMigrationMapping {
        $params = Util::removeNulls(['legacyListID' => $legacyListID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getIDMapping(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
