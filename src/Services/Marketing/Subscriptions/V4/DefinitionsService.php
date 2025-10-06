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
     * Retrieve all subscription status definitions
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
