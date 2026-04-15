<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface DefinitionsContract
{
    /**
     * @api
     *
     * @param int $businessUnitID an integer representing the ID of the business unit for which to retrieve subscription definitions
     * @param bool $includeTranslations a boolean indicating whether to include translations of the communication preferences definitions in the response
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
