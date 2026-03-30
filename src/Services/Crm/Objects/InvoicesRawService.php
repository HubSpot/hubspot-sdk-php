<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\FilterGroup;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Invoices\InvoiceCreateParams;
use HubspotSDK\Crm\Objects\Invoices\InvoiceDeleteParams;
use HubspotSDK\Crm\Objects\Invoices\InvoiceGetParams;
use HubspotSDK\Crm\Objects\Invoices\InvoiceListParams;
use HubspotSDK\Crm\Objects\Invoices\InvoiceSearchParams;
use HubspotSDK\Crm\Objects\Invoices\InvoiceUpdateParams;
use HubspotSDK\Crm\Objects\Invoices\InvoiceUpsertParams;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\InvoicesRawContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type FilterGroupShape from \HubspotSDK\Crm\FilterGroup
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 */
final class InvoicesRawService implements InvoicesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create multiple invoices at once by providing a batch of invoice data, and receive a response with details of the created invoices, including their IDs.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
     * }|InvoiceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|InvoiceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/invoices/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update multiple invoices in a single request using either their internal IDs or unique property values. This endpoint allows for efficient batch processing of invoice updates, ensuring that changes are applied consistently across multiple records.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
     * }|InvoiceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        array|InvoiceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/invoices/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of invoices. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|InvoiceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/objects/2026-03/invoices',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archive multiple invoices by their IDs in a single request. This operation moves the specified invoices to the archive, making them inactive but retrievable for future reference.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
     * }|InvoiceDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|InvoiceDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/invoices/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve records by record ID or include the `idProperty` parameter to retrieve records by a custom unique value property.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>,
     *   properties: list<string>,
     *   propertiesWithHistory: list<string>,
     *   archived?: bool,
     *   idProperty?: string,
     * }|InvoiceGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|InvoiceGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/invoices/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Execute a search for invoices based on filter criteria, sorting options, and properties to include in the response. This endpoint supports pagination and allows for complex queries using multiple filter groups.
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<FilterGroup|FilterGroupShape>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|InvoiceSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|InvoiceSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/invoices/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update records identified by a unique property value as specified by the `idProperty` query param. `idProperty` query param refers to a property whose values are unique for the object.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape>,
     * }|InvoiceUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicUpsertObject>
     *
     * @throws APIException
     */
    public function upsert(
        array|InvoiceUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/invoices/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicUpsertObject::class,
        );
    }
}
