<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubSpotSDK\CommunicationPreferences\Definitions\DefinitionListParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
