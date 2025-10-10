<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\CollectionResponseSimplePublicObjectWithAssociations;
use HubspotSDK\CRM\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\FilterGroup;
use HubspotSDK\CRM\Objects\PublicAssociationsForObject;
use HubspotSDK\CRM\Objects\SimplePublicObject;
use HubspotSDK\CRM\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface DealsContract
{
    /**
     * @api
     *
     * @param array<string, string> $properties
     * @param list<PublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function createByObjectTypeID(
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
    public function createByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByObjectTypeID(
        string $dealID,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    public function getByObjectTypeID(
        string $dealID,
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
    public function getByObjectTypeIDRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObjectWithAssociations;

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
    public function listByObjectTypeID(
        $after = omit,
        $archived = omit,
        $associations = omit,
        $limit = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseSimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseSimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $objectIDToMerge
     * @param string $primaryObjectID
     *
     * @throws APIException
     */
    public function mergeByObjectTypeID(
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
    public function mergeByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

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
    public function searchByObjectTypeID(
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
    public function searchByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, string> $properties
     * @param string $idProperty
     *
     * @throws APIException
     */
    public function updateByObjectTypeID(
        string $dealID,
        $properties,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateByObjectTypeIDRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;
}
