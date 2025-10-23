<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\CRM\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\CRM\Associations\Schema\V4\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubspotSDK\CRM\Associations\Schema\V4\Configurations\ConfigurationBatchCreateByObjectTypesParams;
use HubspotSDK\CRM\Associations\Schema\V4\Configurations\ConfigurationBatchDeleteByObjectTypesParams;
use HubspotSDK\CRM\Associations\Schema\V4\Configurations\ConfigurationBatchUpdateByObjectTypesParams;
use HubspotSDK\CRM\Associations\Schema\V4\Configurations\ConfigurationGetByObjectTypesParams;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationSpec;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\Schema\V4\ConfigurationsContract;

final class ConfigurationsService implements ConfigurationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns all user configurations available on a given portal
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v4/associations/definitions/configurations/all',
            options: $requestOptions,
            convert: CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Batch create user configurations between two object types
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchCreateByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionUserConfiguration {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchCreateByObjectTypesRaw(
            $toObjectType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicAssociationDefinitionUserConfiguration {
        [
            $parsed, $options,
        ] = ConfigurationBatchCreateByObjectTypesParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/definitions/configurations/%1$s/%2$s/batch/create',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponsePublicAssociationDefinitionUserConfiguration::class,
        );
    }

    /**
     * @api
     *
     * Batch delete user configurations between two object types
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationSpec> $inputs
     *
     * @throws APIException
     */
    public function batchDeleteByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchDeleteByObjectTypesRaw(
            $toObjectType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchDeleteByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [
            $parsed, $options,
        ] = ConfigurationBatchDeleteByObjectTypesParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/definitions/configurations/%1$s/%2$s/batch/purge',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Batch update user configurations between two object types
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpdateByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchUpdateByObjectTypesRaw(
            $toObjectType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpdateByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult {
        [
            $parsed, $options,
        ] = ConfigurationBatchUpdateByObjectTypesParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/definitions/configurations/%1$s/%2$s/batch/update',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponsePublicAssociationDefinitionConfigurationUpdateResult::class,
        );
    }

    /**
     * @api
     *
     * Returns user configurations on all association definitions between two object types
     *
     * @param string $fromObjectType
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging {
        $params = ['fromObjectType' => $fromObjectType];

        return $this->getByObjectTypesRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging {
        [$parsed, $options] = ConfigurationGetByObjectTypesParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v4/associations/definitions/configurations/%1$s/%2$s',
                $fromObjectType,
                $toObjectType,
            ],
            options: $options,
            convert: CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
        );
    }
}
