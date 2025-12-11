<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientGetParams;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientListParams;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientSearchParams;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClientsRawContract;

final class PartnerClientsRawService implements PartnerClientsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $partnerClientID Path param:
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|PartnerClientUpdateParams $params
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $partnerClientID,
        array|PartnerClientUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerClientUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['idProperty']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/partner_clients/%1$s', $partnerClientID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|PartnerClientListParams $params
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerClientListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerClientListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/partner_clients',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|PartnerClientGetParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $partnerClientID,
        array|PartnerClientGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerClientGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/partner_clients/%1$s', $partnerClientID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|PartnerClientSearchParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|PartnerClientSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerClientSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/partner_clients/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
