<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\BatchResponsePublicAssociation;
use HubspotSDK\CRM\Associations\BatchResponsePublicAssociationMulti;
use HubspotSDK\CRM\Associations\PublicAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface AssociationsContract
{
    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociation> $inputs
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociation;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociation;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociation> $inputs
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
     * @param list<PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function read(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMulti;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMulti;
}
