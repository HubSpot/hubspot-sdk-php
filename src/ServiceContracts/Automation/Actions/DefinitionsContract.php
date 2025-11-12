<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionGetParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface DefinitionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DefinitionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|DefinitionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|DefinitionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionListParams $params
     *
     * @return Page<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        array|DefinitionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        array|DefinitionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        array|DefinitionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition;
}
