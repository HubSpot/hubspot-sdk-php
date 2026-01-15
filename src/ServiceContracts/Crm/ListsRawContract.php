<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ListsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ListCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ListCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListsByIDResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ListListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ID of the list that you want to cancel the conversion for
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteScheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list to fetch
     * @param array<string,mixed>|ListGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        array|ListGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listName Path param: The name of the list to fetch. This is **not** case sensitive.
     * @param array<string,mixed>|ListGetByObjectTypeIDAndNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFetchResponse>
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndName(
        string $listName,
        array|ListGetByObjectTypeIDAndNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ID of the list to schedule the conversion for
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicListConversionResponse>
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list to restore
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ID of the list to schedule the conversion for
     * @param array<string,mixed>|ListScheduleConversionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicListConversionResponse>
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        array|ListScheduleConversionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListSearchResponse>
     *
     * @throws APIException
     */
    public function search(
        array|ListSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID path param: The **ILS ID** of the list to update
     * @param array<string,mixed>|ListUpdateFiltersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function updateFilters(
        string $listID,
        array|ListUpdateFiltersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list to update
     * @param array<string,mixed>|ListUpdateNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function updateName(
        string $listID,
        array|ListUpdateNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
