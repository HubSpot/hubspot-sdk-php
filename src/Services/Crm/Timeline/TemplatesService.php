<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\Templates\TemplateCreateParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateDeleteParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateGetParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateUpdateParams;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TemplatesContract;

use const HubspotSDK\Core\OMIT as omit;

final class TemplatesService implements TemplatesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Event templates define the general structure for a custom timeline event, and enable you to send event data to HubSpot. A template includes formatted copy for its heading and details, as well as any custom property definitions. A single app can include up to 750 event templates.<br/><Warning>the `v1` and `v3` timeline events APIs are only available for app partners with existing `v1`/`v3` timeline events defined in their public app. <ul><li>If your app doesn't include any timeline events yet, requests to this endpoint will fail. Instead, you can get started on [latest version of the developer platform](/apps/developer-platform/build-apps/overview). Note that you'll need to request approval before you can define app events for your app. Learn more in the [app events overview](/apps/developer-platform/add-features/app-events/overview).</li><li>If your app includes a `v1`/`v3` timeline event, learn how to [migrate it to the developer platform](/apps/developer-platform/add-features/app-events/create-and-manage-event-types#migrate-an-existing-timeline-event-type). You don't need to request approval before migrating existing event types.</li></ul>If you're not an app partner, you can send custom event data to HubSpot using the [custom events API](/api-reference/events-manage-event-definitions-v3/guide).</Warning>
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
    ): TimelineEventTemplate {
        $params = [
            'name' => $name,
            'objectType' => $objectType,
            'tokens' => $tokens,
            'detailTemplate' => $detailTemplate,
            'headerTemplate' => $headerTemplate,
        ];

        return $this->createRaw($appID, $params, $requestOptions);
    }

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
    ): TimelineEventTemplate {
        [$parsed, $options] = TemplateCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['integrators/timeline/v3/%1$s/event-templates', $appID],
            body: (object) $parsed,
            options: $options,
            convert: TimelineEventTemplate::class,
        );
    }

    /**
     * @api
     *
     * Update an existing event template, specified by ID.
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
    ): TimelineEventTemplate {
        $params = [
            'appID' => $appID,
            'id' => $id,
            'name' => $name,
            'tokens' => $tokens,
            'detailTemplate' => $detailTemplate,
            'headerTemplate' => $headerTemplate,
        ];

        return $this->updateRaw($eventTemplateID, $params, $requestOptions);
    }

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
    ): TimelineEventTemplate {
        [$parsed, $options] = TemplateUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: TimelineEventTemplate::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all templates defined for an app.
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseTimelineEventTemplateNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['integrators/timeline/v3/%1$s/event-templates', $appID],
            options: $requestOptions,
            convert: CollectionResponseTimelineEventTemplateNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete an event type template by ID.
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID];

        return $this->deleteRaw($eventTemplateID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = TemplateDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve an event type template by ID.
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): TimelineEventTemplate {
        $params = ['appID' => $appID];

        return $this->getRaw($eventTemplateID, $params, $requestOptions);
    }

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
    ): TimelineEventTemplate {
        [$parsed, $options] = TemplateGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            options: $options,
            convert: TimelineEventTemplate::class,
        );
    }
}
