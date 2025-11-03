<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerServices;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface AssociationsContract
{
    /**
     * @api
     *
     * @param string $partnerServiceID
     * @param string $toObjectType
     * @param string $toObjectID
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        $partnerServiceID,
        $toObjectType,
        $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $associationType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $partnerServiceID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeFa
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $partnerServiceID,
        $after = omit,
        $includeFa = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $partnerServiceID
     * @param string $toObjectType
     * @param string $toObjectID
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        $partnerServiceID,
        $toObjectType,
        $toObjectID,
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
        string $associationType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
