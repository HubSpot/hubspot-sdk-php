<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Contracts\ContractCreateParams;
use HubspotSDK\Crm\Objects\Contracts\ContractGetParams;
use HubspotSDK\Crm\Objects\Contracts\ContractListParams;
use HubspotSDK\Crm\Objects\Contracts\ContractSearchParams;
use HubspotSDK\Crm\Objects\Contracts\ContractUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\ContractsContract;
use HubspotSDK\Services\Crm\Objects\Contracts\BatchService;

final class ContractsService implements ContractsContract
{
    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a contract with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard contracts is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|ContractCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ContractCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = ContractCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreatedResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{contractId}`or optionally a unique property value as specified by the `idProperty` query param. `{contractId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|ContractUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $contractID,
        array|ContractUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = ContractUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        /** @var BaseResponse<SimplePublicObject> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/contracts/%1$s', $contractID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a page of contracts. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ContractListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ContractListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ContractListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<SimplePublicObjectWithAssociations>> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/contracts',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Move an Object identified by `{contractId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $contractID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/contracts/%1$s', $contractID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read an Object identified by `{contractId}`. `{contractId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ContractGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $contractID,
        array|ContractGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = ContractGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimplePublicObjectWithAssociations> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/contracts/%1$s', $contractID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );

        return $response->parse();
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
     * }|ContractSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ContractSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = ContractSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CollectionResponseWithTotalSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );

        return $response->parse();
    }
}
