<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Discounts\DiscountCreateParams;
use HubspotSDK\Crm\Objects\Discounts\DiscountGetParams;
use HubspotSDK\Crm\Objects\Discounts\DiscountListParams;
use HubspotSDK\Crm\Objects\Discounts\DiscountSearchParams;
use HubspotSDK\Crm\Objects\Discounts\DiscountUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\DiscountsContract;
use HubspotSDK\Services\Crm\Objects\Discounts\BatchService;

final class DiscountsService implements DiscountsContract
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
     * Create a discount with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard discounts is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|DiscountCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DiscountCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = DiscountCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreatedResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/discounts',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{discountId}`or optionally a unique property value as specified by the `idProperty` query param. `{discountId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|DiscountUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $discountID,
        array|DiscountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = DiscountUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        /** @var BaseResponse<SimplePublicObject> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/discounts/%1$s', $discountID],
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
     * Read a page of discounts. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|DiscountListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|DiscountListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = DiscountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<SimplePublicObjectWithAssociations>> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/discounts',
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
     * Move an Object identified by `{discountId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $discountID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/discounts/%1$s', $discountID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read an Object identified by `{discountId}`. `{discountId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|DiscountGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $discountID,
        array|DiscountGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = DiscountGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimplePublicObjectWithAssociations> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/discounts/%1$s', $discountID],
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
     * }|DiscountSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|DiscountSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = DiscountSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CollectionResponseWithTotalSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/discounts/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );

        return $response->parse();
    }
}
