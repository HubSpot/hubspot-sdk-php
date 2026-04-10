<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Timeline\AppEventResolutionResponse;
use HubSpotSDK\Crm\Timeline\TimelineCreateEventParams;
use HubSpotSDK\Crm\Timeline\TimelineCreateProjectTypeParams;
use HubSpotSDK\Crm\Timeline\TimelineEventIFrame;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\TimelineRawContract;

/**
 * @phpstan-import-type TimelineEventIFrameShape from \HubSpotSDK\Crm\Timeline\TimelineEventIFrame
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class TimelineRawService implements TimelineRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a single instance of event data to a specified event type.
     *
     * @param array{
     *   id: string,
     *   eventTypeName: string,
     *   properties: array<string,string>,
     *   domain?: string,
     *   email?: string,
     *   extraData?: mixed,
     *   objectID?: string,
     *   objectTypeFullyQualifiedName?: string,
     *   timelineIFrame?: TimelineEventIFrame|TimelineEventIFrameShape,
     *   timestamp?: \DateTimeInterface,
     *   utk?: string,
     * }|TimelineCreateEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createEvent(
        array|TimelineCreateEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TimelineCreateEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'integrators/timeline/2026-03/events',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   developerSymbol: string, projectName: string
     * }|TimelineCreateProjectTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AppEventResolutionResponse>
     *
     * @throws APIException
     */
    public function createProjectType(
        array|TimelineCreateProjectTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TimelineCreateProjectTypeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'integrators/timeline/2026-03/types/projects',
            body: (object) $parsed,
            options: $options,
            convert: AppEventResolutionResponse::class,
        );
    }
}
