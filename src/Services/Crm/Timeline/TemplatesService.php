<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\Templates\TemplateCreateParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateDeleteParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateGetParams;
use HubspotSDK\Crm\Timeline\Templates\TemplateUpdateParams;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken\Type;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TemplatesContract;

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
     * @param array{
     *   name: string,
     *   objectType: string,
     *   tokens: list<array{
     *     label: string,
     *     name: string,
     *     type: 'date'|'enumeration'|'number'|'string'|Type,
     *     createdAt?: string|\DateTimeInterface,
     *     objectPropertyName?: string,
     *     options?: list<mixed>,
     *     updatedAt?: string|\DateTimeInterface,
     *   }|TimelineEventTemplateToken>,
     *   detailTemplate?: string,
     *   headerTemplate?: string,
     * }|TemplateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|TemplateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate {
        [$parsed, $options] = TemplateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<TimelineEventTemplate> */
        $response = $this->client->request(
            method: 'post',
            path: ['integrators/timeline/v3/%1$s/event-templates', $appID],
            body: (object) $parsed,
            options: $options,
            convert: TimelineEventTemplate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing event template, specified by ID.
     *
     * @param array{
     *   appId: int,
     *   id: string,
     *   name: string,
     *   tokens: list<array{
     *     label: string,
     *     name: string,
     *     type: 'date'|'enumeration'|'number'|'string'|Type,
     *     createdAt?: string|\DateTimeInterface,
     *     objectPropertyName?: string,
     *     options?: list<mixed>,
     *     updatedAt?: string|\DateTimeInterface,
     *   }|TimelineEventTemplateToken>,
     *   detailTemplate?: string,
     *   headerTemplate?: string,
     * }|TemplateUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $eventTemplateID,
        array|TemplateUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate {
        [$parsed, $options] = TemplateUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        /** @var BaseResponse<TimelineEventTemplate> */
        $response = $this->client->request(
            method: 'put',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: TimelineEventTemplate::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<CollectionResponseTimelineEventTemplateNoPaging> */
        $response = $this->client->request(
            method: 'get',
            path: ['integrators/timeline/v3/%1$s/event-templates', $appID],
            options: $requestOptions,
            convert: CollectionResponseTimelineEventTemplateNoPaging::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an event type template by ID.
     *
     * @param array{appId: int}|TemplateDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        array|TemplateDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TemplateDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an event type template by ID.
     *
     * @param array{appId: int}|TemplateGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        array|TemplateGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplate {
        [$parsed, $options] = TemplateGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        /** @var BaseResponse<TimelineEventTemplate> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            options: $options,
            convert: TimelineEventTemplate::class,
        );

        return $response->parse();
    }
}
