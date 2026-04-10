<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation\Actions;

use HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateRequiresObjectParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionGetParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionGetRequiresObjectParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubSpotSDK\Automation\Actions\PublicActionDefinition;
use HubSpotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface DefinitionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|DefinitionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param array<string,mixed>|DefinitionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|DefinitionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicActionDefinition>>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        array|DefinitionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        array|DefinitionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param array<string,mixed>|DefinitionCreateRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createRequiresObject(
        string $definitionID,
        array|DefinitionCreateRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param array<string,mixed>|DefinitionGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        array|DefinitionGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionGetRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinitionRequiresObjectResponse>
     *
     * @throws APIException
     */
    public function getRequiresObject(
        string $definitionID,
        array|DefinitionGetRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
