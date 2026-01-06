<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociation;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMulti;
use HubspotSDK\Crm\Associations\PublicAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
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
    ): BatchResponsePublicAssociation;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): BatchResponsePublicAssociationMulti;
}
