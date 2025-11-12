<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormGetParams;
use HubspotSDK\Marketing\Forms\FormListParams;
use HubspotSDK\Marketing\Forms\FormUpdateParams;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FormsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase;

    /**
     * @api
     *
     * @param array<mixed>|FormUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        array|FormUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase;

    /**
     * @api
     *
     * @param array<mixed>|FormListParams $params
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|FormGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        array|FormGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase;

    /**
     * @api
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase;
}
