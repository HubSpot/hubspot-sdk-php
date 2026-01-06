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

interface FormsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $formID the ID of the form to update
     * @param array<mixed>|FormUpdateParams $params
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        array|FormUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FormListParams $params
     *
     * @return BaseResponse<Page<HubSpotFormDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $formID the ID of the form to archive
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $formID The unique identifier of the form
     * @param array<mixed>|FormGetParams $params
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        array|FormGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
