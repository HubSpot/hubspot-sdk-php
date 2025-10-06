<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface DefinitionsContract
{
    /**
     * @api
     *
     * @param int $businessUnitID
     * @param bool $includeTranslations
     *
     * @throws APIException
     */
    public function list(
        $businessUnitID = omit,
        $includeTranslations = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsSubscriptionDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionResponseWithResultsSubscriptionDefinition;
}
