<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\FilterGroup;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceGetParams;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceListParams;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceSearchParams;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceUpdateParams;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerServicesRawContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 * @phpstan-import-type FilterGroupShape from \HubspotSDK\Crm\FilterGroup
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class PartnerServicesRawService implements PartnerServicesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update multiple partner services using their internal IDs or unique property values. This operation allows for batch processing of updates, ensuring efficient synchronization of service data between HubSpot and other systems.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
     * }|PartnerServiceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        array|PartnerServiceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerServiceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/partner_services/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of associations for a specific partner service, filtered by the type of associated object.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   partnerServiceID: string, after?: string, limit?: int
     * }|PartnerServiceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MultiAssociatedObjectWithLabel>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|PartnerServiceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerServiceListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/objects/2026-03/partner_services/%1$s/associations/%2$s',
                $partnerServiceID,
                $toObjectType,
            ],
            query: $parsed,
            options: $options,
            convert: MultiAssociatedObjectWithLabel::class,
            page: Page::class,
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
     * }|PartnerServiceGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|PartnerServiceGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerServiceGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/partner_services/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Execute a search query to find partner services based on defined filters, properties, and sorting options. This endpoint allows you to retrieve a collection of partner services that match the specified search criteria.
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<FilterGroup|FilterGroupShape>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|PartnerServiceSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|PartnerServiceSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerServiceSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/partner_services/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
