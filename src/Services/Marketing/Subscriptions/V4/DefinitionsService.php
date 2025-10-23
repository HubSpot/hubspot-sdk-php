<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\Marketing\Subscriptions\V4\Definitions\DefinitionListParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\DefinitionsContract;

use const HubspotSDK\Core\OMIT as omit;

final class DefinitionsService implements DefinitionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of subscription status definitions from the account.
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
    ): ActionResponseWithResultsSubscriptionDefinition {
        $params = [
            'businessUnitID' => $businessUnitID,
            'includeTranslations' => $includeTranslations,
        ];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): ActionResponseWithResultsSubscriptionDefinition {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'communication-preferences/v4/definitions',
            query: $parsed,
            options: $options,
            convert: ActionResponseWithResultsSubscriptionDefinition::class,
        );
    }
}
