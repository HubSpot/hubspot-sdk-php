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
     * @param int $businessUnitID the unique identifier of the business unit for which to retrieve the subscription definitions
     * @param bool $includeTranslations A boolean indicating whether to include translations of the subscription definitions. Defaults to false if not specified.
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
