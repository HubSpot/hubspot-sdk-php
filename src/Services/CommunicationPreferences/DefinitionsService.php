<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CommunicationPreferences;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CommunicationPreferences\DefinitionsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class DefinitionsService implements DefinitionsContract
{
    /**
     * @api
     */
    public DefinitionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DefinitionsRawService($client);
    }

    /**
     * @api
     *
     * Get a list of subscription status definitions from the account.
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
    ): ActionResponseWithResultsSubscriptionDefinition {
        $params = Util::removeNulls(
            [
                'businessUnitID' => $businessUnitID,
                'includeTranslations' => $includeTranslations,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
