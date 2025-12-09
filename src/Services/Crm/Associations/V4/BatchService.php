<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\V4\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Batch create associations for objects
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param string $fromObjectType Path param: The type of the from Object
     * @param list<array{
     *   from: array{id: string}|PublicObjectID,
     *   to: array{id: string}|PublicObjectID,
     *   types: list<array{
     *     associationCategory: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|AssociationCategory,
     *     associationTypeID: int,
     *   }|AssociationSpec>,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch delete associations for objects
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the batch association deletion
     * @param string $fromObjectType path param: Specifies the type of the source object in the batch association deletion
     * @param list<array{
     *   from: array{id: string}|PublicObjectID,
     *   to: list<array{id: string}|PublicObjectID>,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the association
     * @param string $fromObjectType path param: Specifies the type of the source object in the association
     * @param list<array{
     *   from: array{id: string}|PublicObjectID, to: array{id: string}|PublicObjectID
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createDefault($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param string $fromObjectType Path param: The type of the from Object
     * @param list<array{
     *   from: array{id: string}|PublicObjectID,
     *   to: array{id: string}|PublicObjectID,
     *   types: list<array{
     *     associationCategory: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|AssociationCategory,
     *     associationTypeID: int,
     *   }|AssociationSpec>,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteLabels($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch read associations for objects to specific object type. The 'after' field in a returned paging object  can be added alongside the 'id' to retrieve the next page of associations from that objectId. The 'link' field is deprecated and should be ignored. Note: The 'paging' field will only be present if there are more pages and absent otherwise.
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param string $fromObjectType Path param: The type of the from Object
     * @param list<array{id: string, after?: string}> $inputs Body param:
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
