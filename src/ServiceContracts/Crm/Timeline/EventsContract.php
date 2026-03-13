<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\TimelineEvent;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type TimelineEventIFrameShape from \HubspotSDK\Crm\Timeline\TimelineEventIFrame
 * @phpstan-import-type TimelineEventShape from \HubspotSDK\Crm\Timeline\TimelineEvent
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
     *
     * @param string $eventTemplateID the event template ID
     * @param array<string,string> $tokens a collection of token keys and values associated with the template tokens
     * @param string $id Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     * @param string $domain the event domain (often paired with utk)
     * @param string $email The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     * @param mixed $extraData additional event-specific data that can be interpreted by the template's markdown
     * @param string $objectID The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     * @param TimelineEventIFrame|TimelineEventIFrameShape $timelineIFrame
     * @param \DateTimeInterface $timestamp The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     * @param string $utk Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        array $tokens,
        ?string $id = null,
        ?string $domain = null,
        ?string $email = null,
        mixed $extraData = null,
        ?string $objectID = null,
        TimelineEventIFrame|array|null $timelineIFrame = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $utk = null,
        RequestOptions|array|null $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param list<TimelineEvent|TimelineEventShape> $inputs a collection of timeline events we want to create
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchCreate(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $eventID the event ID
     * @param string $eventTemplateID the event template ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        string $eventTemplateID,
        RequestOptions|array|null $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param string $eventID the event ID
     * @param string $eventTemplateID the event template ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        string $eventTemplateID,
        RequestOptions|array|null $requestOptions = null,
    ): EventDetail;
}
