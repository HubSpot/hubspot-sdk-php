<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\AppEventResolutionResponse;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type TimelineEventIFrameShape from \HubspotSDK\Crm\Timeline\TimelineEventIFrame
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
