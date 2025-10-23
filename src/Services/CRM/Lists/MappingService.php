<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Lists\Mapping\MappingBatchCreateIDMappingParams;
use HubspotSDK\CRM\Lists\Mapping\MappingGetIDMappingParams;
use HubspotSDK\CRM\Lists\PublicBatchMigrationMapping;
use HubspotSDK\CRM\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Lists\MappingContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param list<string> $body
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        $body,
        ?RequestOptions $requestOptions = null
    ): PublicBatchMigrationMapping {
        $params = ['body' => $body];

        return $this->batchCreateIDMappingRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateIDMappingRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicBatchMigrationMapping {
        [$parsed, $options] = MappingBatchCreateIDMappingParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $legacyListID the legacy list id from lists v1 API
     *
     * @throws APIException
     */
    public function getIDMapping(
        $legacyListID = omit,
        ?RequestOptions $requestOptions = null
    ): PublicMigrationMapping {
        $params = ['legacyListID' => $legacyListID];

        return $this->getIDMappingRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getIDMappingRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicMigrationMapping {
        [$parsed, $options] = MappingGetIDMappingParams::parseRequest(
            $params,
            $requestOptions
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
