<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Timeline\AppEventResolutionResponse;
use HubSpotSDK\Crm\Timeline\TimelineEventIFrame;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\TimelineContract;
use HubSpotSDK\Services\Crm\Timeline\BatchService;

/**
 * @phpstan-import-type TimelineEventIFrameShape from \HubSpotSDK\Crm\Timeline\TimelineEventIFrame
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class TimelineService implements TimelineContract
{
    /**
     * @api
     */
    public TimelineRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TimelineRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Send a single instance of event data to a specified event type.
     *
     * @param array<string,string> $properties
     * @param TimelineEventIFrame|TimelineEventIFrameShape $timelineIFrame
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEvent(
        string $id,
        string $eventTypeName,
        array $properties,
        ?string $domain = null,
        ?string $email = null,
        mixed $extraData = null,
        ?string $objectID = null,
        ?string $objectTypeFullyQualifiedName = null,
        TimelineEventIFrame|array|null $timelineIFrame = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $utk = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'eventTypeName' => $eventTypeName,
                'properties' => $properties,
                'domain' => $domain,
                'email' => $email,
                'extraData' => $extraData,
                'objectID' => $objectID,
                'objectTypeFullyQualifiedName' => $objectTypeFullyQualifiedName,
                'timelineIFrame' => $timelineIFrame,
                'timestamp' => $timestamp,
                'utk' => $utk,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createProjectType(
        string $developerSymbol,
        string $projectName,
        RequestOptions|array|null $requestOptions = null,
    ): AppEventResolutionResponse {
        $params = Util::removeNulls(
            ['developerSymbol' => $developerSymbol, 'projectName' => $projectName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createProjectType(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
