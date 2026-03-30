<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetCreateParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetGetParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetListParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetSearchParams;
use HubspotSDK\Crm\Objects\GoalTargets\GoalTargetUpdateParams;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface GoalTargetsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GoalTargetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|GoalTargetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $goalTargetID Path param
     * @param array<string,mixed>|GoalTargetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $goalTargetID,
        array|GoalTargetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GoalTargetListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|GoalTargetListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $goalTargetID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GoalTargetGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $goalTargetID,
        array|GoalTargetGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GoalTargetSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|GoalTargetSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
