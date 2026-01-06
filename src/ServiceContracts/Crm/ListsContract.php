<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\ListCreateParams;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListGetByObjectTypeIDAndNameParams;
use HubspotSDK\Crm\Lists\ListGetParams;
use HubspotSDK\Crm\Lists\ListListParams;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams;
use HubspotSDK\Crm\Lists\ListSearchParams;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListUpdateFiltersParams;
use HubspotSDK\Crm\Lists\ListUpdateNameParams;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\RequestOptions;

interface ListsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ListCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ListCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ListCreateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ListListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ListListParams $params,
        ?RequestOptions $requestOptions = null
    ): ListsByIDResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ListGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        array|ListGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse;

    /**
     * @api
     *
     * @param array<mixed>|ListGetByObjectTypeIDAndNameParams $params
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndName(
        string $listName,
        array|ListGetByObjectTypeIDAndNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): PublicListConversionResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ListScheduleConversionParams $params
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        array|ListScheduleConversionParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicListConversionResponse;

    /**
     * @api
     *
     * @param array<mixed>|ListSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ListSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): ListSearchResponse;

    /**
     * @api
     *
     * @param array<mixed>|ListUpdateFiltersParams $params
     *
     * @throws APIException
     */
    public function updateFilters(
        string $listID,
        array|ListUpdateFiltersParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ListUpdateNameParams $params
     *
     * @throws APIException
     */
    public function updateName(
        string $listID,
        array|ListUpdateNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListUpdateResponse;
}
