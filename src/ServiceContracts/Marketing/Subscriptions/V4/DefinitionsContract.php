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
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $includeTranslations set to `true` to return subscription translations associated with each definition
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
