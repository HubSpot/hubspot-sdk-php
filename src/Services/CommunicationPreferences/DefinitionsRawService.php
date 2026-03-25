<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CommunicationPreferences;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;
use HubspotSDK\CommunicationPreferences\Definitions\DefinitionListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CommunicationPreferences\DefinitionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class DefinitionsRawService implements DefinitionsRawContract
{
    // @phpstan-ignore-next-line
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithResultsSubscriptionDefinition>
     *
     * @throws APIException
     */
    public function list(
        array|DefinitionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'communication-preferences/2026-03/definitions',
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsSubscriptionDefinition::class,
        );
    }
}
