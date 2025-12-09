<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
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
    ): BatchResponseLabelsBetweenObjectPair;

    /**
     * @api
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
    ): BatchResponseVoid;

    /**
     * @api
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
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
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
    ): BatchResponseVoid;

    /**
     * @api
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
    ): BatchResponsePublicAssociationMultiWithLabel;
}
