<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationBatchCreateParams;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationBatchDeleteParams;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationBatchUpdateParams;
use HubspotSDK\Crm\Associations\Schema\V4\Configurations\ConfigurationGetByObjectTypesParams;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4\ConfigurationsRawContract;

final class ConfigurationsRawService implements ConfigurationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfiguration,>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/associations/v4/definitions/configurations/all',
            options: $requestOptions,
            convert: CollectionResponsePublicAssociationDefinitionUserConfiguration::class,
        );
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     category: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|Category,
     *     maxToObjectIDs: int,
     *     typeID: int,
     *   }>,
     * }|ConfigurationBatchCreateParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionUserConfiguration>
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        array|ConfigurationBatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConfigurationBatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/v4/definitions/configurations/%1$s/%2$s/batch/create',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponsePublicAssociationDefinitionUserConfiguration::class,
        );
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array{
     *   fromObjectType: string, inputs: list<array{category: string, typeID: int}>
     * }|ConfigurationBatchDeleteParams $params
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        array|ConfigurationBatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConfigurationBatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/v4/definitions/configurations/%1$s/%2$s/batch/purge',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponseVoid::class,
        );
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     category: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|\HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest\Category,
     *     maxToObjectIDs: int,
     *     typeID: int,
     *   }>,
     * }|ConfigurationBatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionConfigurationUpdateResult,>
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        array|ConfigurationBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConfigurationBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/v4/definitions/configurations/%1$s/%2$s/batch/update',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponsePublicAssociationDefinitionConfigurationUpdateResult::class,
        );
    }

    /**
     * @api
     *
     * @param array{fromObjectType: string}|ConfigurationGetByObjectTypesParams $params
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfiguration,>
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        array|ConfigurationGetByObjectTypesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConfigurationGetByObjectTypesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/associations/v4/definitions/configurations/%1$s/%2$s',
                $fromObjectType,
                $toObjectType,
            ],
            options: $options,
            convert: CollectionResponsePublicAssociationDefinitionUserConfiguration::class,
        );
    }
}
