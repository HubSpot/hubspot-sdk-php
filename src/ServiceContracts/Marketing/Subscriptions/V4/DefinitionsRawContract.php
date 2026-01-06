<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\Marketing\Subscriptions\V4\Definitions\DefinitionListParams;
use HubspotSDK\RequestOptions;

interface DefinitionsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|DefinitionListParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsSubscriptionDefinition>
     *
     * @throws APIException
     */
    public function list(
        array|DefinitionListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
