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
