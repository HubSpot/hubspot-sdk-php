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
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TemplatesRawContract;

/**
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TemplatesRawService implements TemplatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Event templates define the general structure for a custom timeline event, and enable you to send event data to HubSpot. A template includes formatted copy for its heading and details, as well as any custom property definitions. A single app can include up to 750 event templates.<br/><Warning>the `v1` and `v3` timeline events APIs are only available for app partners with existing `v1`/`v3` timeline events defined in their public app. <ul><li>If your app doesn't include any timeline events yet, requests to this endpoint will fail. Instead, you can get started on [latest version of the developer platform](/apps/developer-platform/build-apps/overview). Note that you'll need to request approval before you can define app events for your app. Learn more in the [app events overview](/apps/developer-platform/add-features/app-events/overview).</li><li>If your app includes a `v1`/`v3` timeline event, learn how to [migrate it to the developer platform](/apps/developer-platform/add-features/app-events/create-and-manage-event-types#migrate-an-existing-timeline-event-type). You don't need to request approval before migrating existing event types.</li></ul>If you're not an app partner, you can send custom event data to HubSpot using the [custom events API](/api-reference/events-manage-event-definitions-v3/guide).</Warning>
     *
     * @param int $appID the ID of the target app
     * @param array{
     *   name: string,
     *   objectType: string,
     *   tokens: list<TimelineEventTemplateToken|TimelineEventTemplateTokenShape>,
     *   detailTemplate?: string,
     *   headerTemplate?: string,
     * }|TemplateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventTemplate>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|TemplateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TemplateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventTemplateID path param: The event template ID
     * @param array{
     *   appID: int,
     *   id: string,
     *   name: string,
     *   tokens: list<TimelineEventTemplateToken|TimelineEventTemplateTokenShape>,
     *   detailTemplate?: string,
     *   headerTemplate?: string,
     * }|TemplateUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventTemplate>
     *
     * @throws APIException
     */
    public function update(
        string $eventTemplateID,
        array|TemplateUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TemplateUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s',
                $appID,
                $eventTemplateID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: TimelineEventTemplate::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all templates defined for an app.
     *
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseTimelineEventTemplateNoPaging>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $eventTemplateID the event template ID
     * @param array{appID: int}|TemplateDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $eventTemplateID,
        array|TemplateDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TemplateDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventTemplateID the event template ID
     * @param array{appID: int}|TemplateGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventTemplate>
     *
     * @throws APIException
     */
    public function get(
        string $eventTemplateID,
        array|TemplateGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TemplateGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
