<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;

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
     * @param array{
     *   headerLabel: string, height: int, linkLabel: string, url: string, width: int
     * }|TimelineEventIFrame $timelineIFrame
     * @param string|\DateTimeInterface $timestamp The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     * @param string $utk Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
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
        array|TimelineEventIFrame|null $timelineIFrame = null,
        string|\DateTimeInterface|null $timestamp = null,
        ?string $utk = null,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param list<array{
     *   eventTemplateID: string,
     *   tokens: array<string,string>,
     *   id?: string,
     *   domain?: string,
     *   email?: string,
     *   extraData?: mixed,
     *   objectID?: string,
     *   timelineIFrame?: array{
     *     headerLabel: string, height: int, linkLabel: string, url: string, width: int
     *   }|TimelineEventIFrame,
     *   timestamp?: string|\DateTimeInterface,
     *   utk?: string,
     * }> $inputs A collection of timeline events we want to create
     *
     * @throws APIException
     */
    public function batchCreate(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $eventID the event ID
     * @param string $eventTemplateID the event template ID
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        string $eventTemplateID,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param string $eventID the event ID
     * @param string $eventTemplateID the event template ID
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        string $eventTemplateID,
        ?RequestOptions $requestOptions = null,
    ): EventDetail;
}
