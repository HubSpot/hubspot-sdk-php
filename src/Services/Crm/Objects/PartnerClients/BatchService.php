<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerClients\Batch\BatchBatchGetParams;
use HubspotSDK\Crm\Objects\PartnerClients\Batch\BatchBatchUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   inputs: list<array{id: string}>,
     *   properties: list<string>,
     *   propertiesWithHistory: list<string>,
     *   archived?: bool,
     *   idProperty?: string,
     * }|BatchBatchGetParams $params
     *
     * @throws APIException
     */
    public function batchGet(
        array|BatchBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchBatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/partner_clients/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   inputs: list<array{
     *     id: string,
     *     properties: array<string,string>,
     *     idProperty?: string,
     *     objectWriteTraceId?: string,
     *   }>,
     * }|BatchBatchUpdateParams $params
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|BatchBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/partner_clients/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }
}
