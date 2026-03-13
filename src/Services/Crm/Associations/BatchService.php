<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociation;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMulti;
use HubspotSDK\Crm\Associations\PublicAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\BatchContract;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type PublicAssociationShape from \HubspotSDK\Crm\Associations\PublicAssociation
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * @param list<PublicAssociation|PublicAssociationShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicAssociation {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

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
     * @param list<PublicAssociation|PublicAssociationShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicAssociationMulti {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
