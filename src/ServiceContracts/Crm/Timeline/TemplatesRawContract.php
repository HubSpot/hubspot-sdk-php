<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\Templates\TemplateCreateParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateDeleteParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateGetParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateUpdateParams;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\RequestOptions;

interface TemplatesRawContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param array<string,mixed>|TemplateCreateParams $params
     *
     * @return BaseResponse<TimelineEventTemplate>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|TemplateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventTemplateID path param: The event template ID
     * @param array<string,mixed>|TemplateUpdateParams $params
     *
     * @return BaseResponse<TimelineEventTemplate>
     *
     * @throws APIException
     */
    public function update(
        string $eventTemplateID,
        array|TemplateUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the target app
     *
     * @return BaseResponse<CollectionResponseTimelineEventTemplateNoPaging>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventTemplateID the event template ID
     * @param array<string,mixed>|TemplateDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        array|TemplateDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventTemplateID the event template ID
     * @param array<string,mixed>|TemplateGetParams $params
     *
     * @return BaseResponse<TimelineEventTemplate>
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        array|TemplateGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
