<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentCreateParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentGetParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentListParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentSearchParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\CommercePaymentsContract;
use HubspotSDK\Services\Crm\Objects\CommercePayments\BatchService;

final class CommercePaymentsService implements CommercePaymentsContract
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
     * Create a commerce payment with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard commerce payments is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|CommercePaymentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CommercePaymentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = CommercePaymentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreatedResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/commerce_payments',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{commercePaymentId}`or optionally a unique property value as specified by the `idProperty` query param. `{commercePaymentId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|CommercePaymentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $commercePaymentID,
        array|CommercePaymentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = CommercePaymentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        /** @var BaseResponse<SimplePublicObject> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/commerce_payments/%1$s', $commercePaymentID],
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
     * Read a page of commerce payments. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|CommercePaymentListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|CommercePaymentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = CommercePaymentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<SimplePublicObjectWithAssociations>> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/commerce_payments',
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
     * Move an Object identified by `{commercePaymentId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $commercePaymentID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/commerce_payments/%1$s', $commercePaymentID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read an Object identified by `{commercePaymentId}`. `{commercePaymentId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|CommercePaymentGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $commercePaymentID,
        array|CommercePaymentGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = CommercePaymentGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimplePublicObjectWithAssociations> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/commerce_payments/%1$s', $commercePaymentID],
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
     * }|CommercePaymentSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|CommercePaymentSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = CommercePaymentSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CollectionResponseWithTotalSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/commerce_payments/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );

        return $response->parse();
    }
}
