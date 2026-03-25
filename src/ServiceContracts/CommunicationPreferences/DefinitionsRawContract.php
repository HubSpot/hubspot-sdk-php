<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\CommunicationPreferences\Definitions\DefinitionListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DefinitionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithResultsSubscriptionDefinition>
     *
     * @throws APIException
     */
    public function list(
        array|DefinitionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
