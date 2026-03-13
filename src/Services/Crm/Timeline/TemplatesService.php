<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TemplatesContract;

/**
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TemplatesService implements TemplatesContract
{
    /**
     * @api
     */
    public TemplatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TemplatesRawService($client);
    }

    /**
     * @api
     *
     * Event templates define the general structure for a custom timeline event, and enable you to send event data to HubSpot. A template includes formatted copy for its heading and details, as well as any custom property definitions. A single app can include up to 750 event templates.<br/><Warning>the `v1` and `v3` timeline events APIs are only available for app partners with existing `v1`/`v3` timeline events defined in their public app. <ul><li>If your app doesn't include any timeline events yet, requests to this endpoint will fail. Instead, you can get started on [latest version of the developer platform](/apps/developer-platform/build-apps/overview). Note that you'll need to request approval before you can define app events for your app. Learn more in the [app events overview](/apps/developer-platform/add-features/app-events/overview).</li><li>If your app includes a `v1`/`v3` timeline event, learn how to [migrate it to the developer platform](/apps/developer-platform/add-features/app-events/create-and-manage-event-types#migrate-an-existing-timeline-event-type). You don't need to request approval before migrating existing event types.</li></ul>If you're not an app partner, you can send custom event data to HubSpot using the [custom events API](/api-reference/events-manage-event-definitions-v3/guide).</Warning>
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
    ): TimelineEventTemplate {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'objectType' => $objectType,
                'tokens' => $tokens,
                'detailTemplate' => $detailTemplate,
                'headerTemplate' => $headerTemplate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing event template, specified by ID.
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
    ): TimelineEventTemplate {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'id' => $id,
                'name' => $name,
                'tokens' => $tokens,
                'detailTemplate' => $detailTemplate,
                'headerTemplate' => $headerTemplate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($eventTemplateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all templates defined for an app.
     *
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseTimelineEventTemplateNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an event type template by ID.
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
    ): mixed {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($eventTemplateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an event type template by ID.
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
    ): TimelineEventTemplate {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($eventTemplateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
