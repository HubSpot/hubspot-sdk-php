<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\CRM\Associations\CRMAssociationsBatchResponsePublicAssociation;
use HubspotSDK\CRM\Associations\CRMAssociationsBatchResponsePublicAssociationMulti;
use HubspotSDK\CRM\Associations\CRMAssociationsPublicAssociation;
use HubspotSDK\CRM\CRMPublicObjectID;
use HubspotSDK\RequestOptions;

interface AssociationsContract
{
    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<CRMAssociationsPublicAssociation> $inputs
     *
     * @return CRMAssociationsBatchResponsePublicAssociation<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationsBatchResponsePublicAssociation;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMAssociationsBatchResponsePublicAssociation<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationsBatchResponsePublicAssociation;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<CRMAssociationsPublicAssociation> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<CRMPublicObjectID> $inputs
     *
     * @return CRMAssociationsBatchResponsePublicAssociationMulti<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationsBatchResponsePublicAssociationMulti;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMAssociationsBatchResponsePublicAssociationMulti<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationsBatchResponsePublicAssociationMulti;
}
