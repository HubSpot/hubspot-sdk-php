<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\CRMObjectsBatchResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsBatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\Objects\CRMObjectsCollectionResponseSimplePublicObjectWithAssociations;
use HubspotSDK\CRM\Objects\CRMObjectsCollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsCreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsFilterGroup;
use HubspotSDK\CRM\Objects\CRMObjectsPublicAssociationsForObject;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInput;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectID;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectWithAssociations;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface CompaniesContract
{
    /**
     * @api
     *
     * @param array<string, string> $properties
     * @param list<CRMObjectsPublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function create(
        $properties,
        $associations = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsCreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsCreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<CRMObjectsSimplePublicObjectBatchInput> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsBatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsBatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param list<string> $associations
     * @param int $limit
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $associations = omit,
        $limit = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsCollectionResponseSimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsCollectionResponseSimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function delete(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectIDToMerge
     * @param string $primaryObjectID
     *
     * @throws APIException
     */
    public function merge(
        $objectIDToMerge,
        $primaryObjectID,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function mergeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObject;

    /**
     * @api
     *
     * @param bool $archived
     * @param list<string> $associations
     * @param string $idProperty
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @throws APIException
     */
    public function read(
        string $companyID,
        $archived = omit,
        $associations = omit,
        $idProperty = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsSimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $companyID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $after
     * @param list<CRMObjectsFilterGroup> $filterGroups
     * @param int $limit
     * @param list<string> $properties
     * @param string $query
     * @param list<string> $sorts
     *
     * @throws APIException
     */
    public function search(
        $after = omit,
        $filterGroups = omit,
        $limit = omit,
        $properties = omit,
        $query = omit,
        $sorts = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsCollectionResponseWithTotalSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsCollectionResponseWithTotalSimplePublicObject;

    /**
     * @api
     *
     * @param list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs
     *
     * @throws APIException
     */
    public function upsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsBatchResponseSimplePublicUpsertObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsBatchResponseSimplePublicUpsertObject;
}
