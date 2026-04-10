<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\CommunicationPreferences;

use HubSpotSDK\Client;
use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\CommunicationPreferences\DefinitionsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
