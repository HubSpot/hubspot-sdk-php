<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Projects\ProjectCreateParams;
use HubspotSDK\Crm\Objects\Projects\ProjectGetParams;
use HubspotSDK\Crm\Objects\Projects\ProjectListParams;
use HubspotSDK\Crm\Objects\Projects\ProjectMergeParams;
use HubspotSDK\Crm\Objects\Projects\ProjectSearchParams;
use HubspotSDK\Crm\Objects\Projects\ProjectUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ProjectsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ProjectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ProjectCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ProjectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $projectID,
        array|ProjectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ProjectListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ProjectListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $projectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ProjectGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $projectID,
        array|ProjectGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|ProjectMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        array|ProjectMergeParams $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ProjectSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ProjectSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
