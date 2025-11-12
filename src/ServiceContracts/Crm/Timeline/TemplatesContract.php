<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\Templates\TemplateCreateParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateDeleteParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateGetParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateUpdateParams;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\RequestOptions;

interface TemplatesContract
{
    /**
     * @api
     *
     * @param array<mixed>|TemplateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|TemplateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param array<mixed>|TemplateUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $eventTemplateID,
        array|TemplateUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseTimelineEventTemplateNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|TemplateDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        array|TemplateDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TemplateGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        array|TemplateGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate;
}
