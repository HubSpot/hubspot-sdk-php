<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\AssociationsSchema;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\AssociationsSchema\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationSpec;
use HubspotSDK\Crm\BatchResponseVoid;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\AssociationsSchema\LimitsContract;

/**
 * @phpstan-import-type PublicAssociationSpecShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationSpec
 * @phpstan-import-type PublicAssociationDefinitionConfigurationUpdateRequestShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class LimitsService implements LimitsContract
{
    /**
     * @api
     */
    public LimitsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LimitsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve all configured association limits between objects, which include details about how different CRM object types are associated with each other.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch delete limits that have been defined for association types between two object types.
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicAssociationSpec|PublicAssociationSpecShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
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
     * Batch update association limits that have been configured between two object types.
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|PublicAssociationDefinitionConfigurationUpdateRequestShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
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
     * Retrieve the configuration details for associations between two specified CRM object types. Use this endpoint to understand limits that have been set for specific association types.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        string $fromObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging {
        $params = Util::removeNulls(['fromObjectType' => $fromObjectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypes($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
