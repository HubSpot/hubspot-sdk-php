<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\Mapping\MappingBatchCreateIDMappingParams;
use HubspotSDK\Crm\Lists\Mapping\MappingGetIDMappingParams;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\MappingContract;

final class MappingService implements MappingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API allows translation of a batch of legacy list id's to list id's. This allows for a maximum of 10,000 id's. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
     *
     * @param list<string> $params
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicBatchMigrationMapping {
        [$parsed, $options] = MappingBatchCreateIDMappingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/lists/idmapping',
            body: $parsed['body'],
            options: $options,
            convert: PublicBatchMigrationMapping::class,
        );
    }

    /**
     * @api
     *
     * This API allows translation of legacy list id to list id. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
     *
     * @param array{legacyListId?: string}|MappingGetIDMappingParams $params
     *
     * @throws APIException
     */
    public function getIDMapping(
        array|MappingGetIDMappingParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicMigrationMapping {
        [$parsed, $options] = MappingGetIDMappingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/lists/idmapping',
            query: $parsed,
            options: $options,
            convert: PublicMigrationMapping::class,
        );
    }
}
