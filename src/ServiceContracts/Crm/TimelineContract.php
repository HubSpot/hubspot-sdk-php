<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Timeline\AppEventResolutionResponse;
use HubSpotSDK\Crm\Timeline\TimelineEventIFrame;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type TimelineEventIFrameShape from \HubSpotSDK\Crm\Timeline\TimelineEventIFrame
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface TimelineContract
{
    /**
     * @api
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
    ): mixed;

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
    ): AppEventResolutionResponse;
}
