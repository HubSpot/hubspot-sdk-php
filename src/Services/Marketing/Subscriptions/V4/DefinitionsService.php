<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\Marketing\Subscriptions\V4\Definitions\DefinitionListParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\DefinitionsContract;

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
     * @param array{
     *   businessUnitID?: int, includeTranslations?: bool
     * }|DefinitionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DefinitionListParams $params,
        ?RequestOptions $requestOptions = null
    ): ActionResponseWithResultsSubscriptionDefinition {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionResponseWithResultsSubscriptionDefinition> */
        $response = $this->client->request(
            method: 'get',
            path: 'communication-preferences/v4/definitions',
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsSubscriptionDefinition::class,
        );

        return $response->parse();
    }
}
