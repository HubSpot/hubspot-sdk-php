<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailCreateParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailGetParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailListParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailSearchParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PostalMailContract;
use HubspotSDK\Services\Crm\Objects\PostalMail\BatchService;

final class PostalMailService implements PostalMailContract
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
     * Create a postal mail object with the given properties and return a copy of the object, including the ID.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|PostalMailCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PostalMailCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = PostalMailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreatedResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/postal_mail',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|PostalMailUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $postalMailID,
        array|PostalMailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = PostalMailUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        /** @var BaseResponse<SimplePublicObject> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/postal_mail/%1$s', $postalMailID],
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|PostalMailListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|PostalMailListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = PostalMailListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<SimplePublicObjectWithAssociations>> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/postal_mail',
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
     * Move the postal mail object with the ID `{postalMailId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $postalMailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/postal_mail/%1$s', $postalMailID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
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
     * }|PostalMailGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $postalMailID,
        array|PostalMailGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = PostalMailGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimplePublicObjectWithAssociations> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/postal_mail/%1$s', $postalMailID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Search for postal mail objects using specific criteria in the request.
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|PostalMailSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|PostalMailSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = PostalMailSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CollectionResponseWithTotalSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/postal_mail/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );

        return $response->parse();
    }
}
