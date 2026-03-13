<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TemplatesContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param string $name the template name
     * @param string $objectType The type of CRM object this template is for. [Contacts, companies, tickets, and deals] are supported.
     * @param list<TimelineEventTemplateToken|TimelineEventTemplateTokenShape> $tokens a collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects
     * @param string $detailTemplate this uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details
     * @param string $headerTemplate this uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $name,
        string $objectType,
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
        RequestOptions|array|null $requestOptions = null,
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param string $eventTemplateID path param: The event template ID
     * @param int $appID path param: The ID of the target app
     * @param string $id body param: The template ID
     * @param string $name body param: The template name
     * @param list<TimelineEventTemplateToken|TimelineEventTemplateTokenShape> $tokens body param: A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects
     * @param string $detailTemplate body param: This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details
     * @param string $headerTemplate body param: This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $eventTemplateID,
        int $appID,
        string $id,
        string $name,
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
        RequestOptions|array|null $requestOptions = null,
    ): TimelineEventTemplate;

    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseTimelineEventTemplateNoPaging;

    /**
     * @api
     *
     * @param string $eventTemplateID the event template ID
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $eventTemplateID the event template ID
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): TimelineEventTemplate;
}
