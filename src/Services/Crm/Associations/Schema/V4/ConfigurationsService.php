<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4\ConfigurationsContract;

final class ConfigurationsService implements ConfigurationsContract
{
    /**
     * @api
     */
    public ConfigurationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConfigurationsRawService($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionUserConfiguration {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param list<array{
     *   category: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|Category,
     *   maxToObjectIDs: int,
     *   typeID: int,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionUserConfiguration {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchCreate($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param list<array{category: string, typeID: int}> $inputs Body param:
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchDelete($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param list<array{
     *   category: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|\HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest\Category,
     *   maxToObjectIDs: int,
     *   typeID: int,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUpdate($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        string $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfiguration {
        $params = Util::removeNulls(['fromObjectType' => $fromObjectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypes($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
