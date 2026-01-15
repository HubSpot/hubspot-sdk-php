<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormGetParams;
use HubspotSDK\Marketing\Forms\FormListParams;
use HubspotSDK\Marketing\Forms\FormUpdateParams;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FormsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $formID the ID of the form to update
     * @param array<string,mixed>|FormUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        array|FormUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FormListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<HubSpotFormDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $formID the ID of the form to archive
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $formID The unique identifier of the form
     * @param array<string,mixed>|FormGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        array|FormGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
