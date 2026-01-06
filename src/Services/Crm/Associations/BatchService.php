<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociation;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMulti;
use HubspotSDK\Crm\Associations\PublicAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\BatchContract;

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
     * This endpoint allows you to create multiple associations between specified 'from' and 'to' object types in a single batch request.
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param string $fromObjectType path param: The type of the source object in the association
     * @param list<array{
     *   from: array{id: string}|PublicObjectID,
     *   to: array{id: string}|PublicObjectID,
     *   type: string,
     * }|PublicAssociation> $inputs Body param:
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociation {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows you to archive multiple associations between specified 'from' and 'to' object types in a single batch request.
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param string $fromObjectType path param: The type of the source object in the association
     * @param list<array{
     *   from: array{id: string}|PublicObjectID,
     *   to: array{id: string}|PublicObjectID,
     *   type: string,
     * }|PublicAssociation> $inputs Body param:
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows you to retrieve multiple associations between specified 'from' and 'to' object types in a single batch request.
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param string $fromObjectType path param: The type of the source object in the association
     * @param list<array{id: string}|PublicObjectID> $inputs Body param:
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMulti {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
