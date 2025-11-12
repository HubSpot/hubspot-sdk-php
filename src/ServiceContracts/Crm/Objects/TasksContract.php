<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Tasks\TaskCreateParams;
use HubspotSDK\Crm\Objects\Tasks\TaskGetParams;
use HubspotSDK\Crm\Objects\Tasks\TaskListParams;
use HubspotSDK\Crm\Objects\Tasks\TaskSearchParams;
use HubspotSDK\Crm\Objects\Tasks\TaskUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface TasksContract
{
    /**
     * @api
     *
     * @param array<mixed>|TaskCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TaskCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TaskUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $taskID,
        array|TaskUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TaskListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|TaskListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TaskGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $taskID,
        array|TaskGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|TaskSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|TaskSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
