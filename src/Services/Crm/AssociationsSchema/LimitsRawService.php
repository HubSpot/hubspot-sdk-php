<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\AssociationsSchema;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\AssociationsSchema\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubspotSDK\Crm\AssociationsSchema\Limits\LimitBatchDeleteParams;
use HubspotSDK\Crm\AssociationsSchema\Limits\LimitBatchUpdateParams;
use HubspotSDK\Crm\AssociationsSchema\Limits\LimitGetByObjectTypesParams;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationSpec;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\AssociationsSchema\LimitsRawContract;

/**
 * @phpstan-import-type PublicAssociationSpecShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationSpec
 * @phpstan-import-type PublicAssociationDefinitionConfigurationUpdateRequestShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class LimitsRawService implements LimitsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all configured association limits between objects, which include details about how different CRM object types are associated with each other.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging,>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/associations/2026-03/definitions/configurations/all',
            options: $requestOptions,
            convert: CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Batch delete limits that have been defined for association types between two object types.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicAssociationSpec|PublicAssociationSpecShape>,
     * }|LimitBatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        array|LimitBatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LimitBatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/2026-03/definitions/configurations/%1$s/%2$s/batch/purge',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Batch update association limits that have been configured between two object types.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicAssociationDefinitionConfigurationUpdateRequest|PublicAssociationDefinitionConfigurationUpdateRequestShape>,
     * }|LimitBatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionConfigurationUpdateResult,>
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        array|LimitBatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LimitBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/2026-03/definitions/configurations/%1$s/%2$s/batch/update',
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
     * Retrieve the configuration details for associations between two specified CRM object types. Use this endpoint to understand limits that have been set for specific association types.
     *
     * @param array{fromObjectType: string}|LimitGetByObjectTypesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging,>
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        array|LimitGetByObjectTypesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LimitGetByObjectTypesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/associations/2026-03/definitions/configurations/%1$s/%2$s',
                $fromObjectType,
                $toObjectType,
            ],
            options: $options,
            convert: CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
        );
    }
}
