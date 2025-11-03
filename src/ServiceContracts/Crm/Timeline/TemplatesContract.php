<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface TemplatesContract
{
    /**
     * @api
     *
     * @param string $name the template name
     * @param string $objectType The type of CRM object this template is for. [Contacts, companies, tickets, and deals] are supported.
     * @param list<TimelineEventTemplateToken> $tokens a collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects
     * @param string $detailTemplate this uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details
     * @param string $headerTemplate this uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $name,
        $objectType,
        $tokens,
        $detailTemplate = omit,
        $headerTemplate = omit,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param int $appID
     * @param string $id the template ID
     * @param string $name the template name
     * @param list<TimelineEventTemplateToken> $tokens a collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects
     * @param string $detailTemplate this uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details
     * @param string $headerTemplate this uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header
     *
     * @throws APIException
     */
    public function update(
        string $eventTemplateID,
        $appID,
        $id,
        $name,
        $tokens,
        $detailTemplate = omit,
        $headerTemplate = omit,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $eventTemplateID,
        array $params,
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
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        $appID,
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
        string $eventTemplateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $eventTemplateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate;
}
