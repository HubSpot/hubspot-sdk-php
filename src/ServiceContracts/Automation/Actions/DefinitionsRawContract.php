<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionGetParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface DefinitionsRawContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param array<string,mixed>|DefinitionCreateParams $params
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|DefinitionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID path param: The ID of the custom action definition
     * @param array<string,mixed>|DefinitionUpdateParams $params
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|DefinitionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param array<string,mixed>|DefinitionListParams $params
     *
     * @return BaseResponse<Page<PublicActionDefinition>>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        array|DefinitionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID the ID of the custom action definition
     * @param array<string,mixed>|DefinitionDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        array|DefinitionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID path param: The ID of the custom action
     * @param array<string,mixed>|DefinitionGetParams $params
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        array|DefinitionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
