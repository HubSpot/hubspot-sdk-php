<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetCreateParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetGetParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetListParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetSearchParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface GoalTargetsContract
{
    /**
     * @api
     *
     * @param array<mixed>|GoalTargetCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GoalTargetCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|GoalTargetUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $goalTargetID,
        array|GoalTargetUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|GoalTargetListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|GoalTargetListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $goalTargetID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|GoalTargetGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $goalTargetID,
        array|GoalTargetGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|GoalTargetSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|GoalTargetSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
