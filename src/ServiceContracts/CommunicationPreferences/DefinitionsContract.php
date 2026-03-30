<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DefinitionsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $businessUnitID = null,
        ?bool $includeTranslations = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsSubscriptionDefinition;
}
