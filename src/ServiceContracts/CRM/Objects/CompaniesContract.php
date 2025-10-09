<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\FilterGroup;
use HubspotSDK\CRM\Objects\PublicAssociationsForObject;
use HubspotSDK\CRM\Objects\SimplePublicObject;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\Objects\SimplePublicObjectID;
use HubspotSDK\CRM\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface CompaniesContract
{
    /**
     * @api
     *
     * @param array<string, string> $properties
     * @param list<PublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function create(
        $properties,
        $associations = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

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
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInput> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

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
    ): BatchResponseSimplePublicObject;

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
     * @return Page<SimplePublicObjectWithAssociations>
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
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param list<SimplePublicObjectID> $inputs
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
    ): SimplePublicObject;

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
    ): SimplePublicObject;

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
    ): SimplePublicObjectWithAssociations;

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
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $after
     * @param list<FilterGroup> $filterGroups
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
    ): CollectionResponseWithTotalSimplePublicObject;

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
    ): CollectionResponseWithTotalSimplePublicObject;

    /**
     * @api
     *
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     *
     * @throws APIException
     */
    public function upsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject;

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
    ): BatchResponseSimplePublicUpsertObject;
}
