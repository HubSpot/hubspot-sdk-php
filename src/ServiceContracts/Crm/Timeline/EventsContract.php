<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\TimelineEvent;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface EventsContract
{
    /**
     * @api
     *
     * @param string $eventTemplateID the event template ID
     * @param array<string,
     * string,> $tokens A collection of token keys and values associated with the template tokens
     * @param string $id Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     * @param string $domain the event domain (often paired with utk)
     * @param string $email The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     * @param mixed $extraData additional event-specific data that can be interpreted by the template's markdown
     * @param string $objectID The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     * @param TimelineEventIFrame $timelineIFrame
     * @param \DateTimeInterface $timestamp The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     * @param string $utk Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     *
     * @throws APIException
     */
    public function create(
        $eventTemplateID,
        $tokens,
        $id = omit,
        $domain = omit,
        $email = omit,
        $extraData = omit,
        $objectID = omit,
        $timelineIFrame = omit,
        $timestamp = omit,
        $utk = omit,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param list<TimelineEvent> $inputs a collection of timeline events we want to create
     *
     * @throws APIException
     */
    public function batchCreate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $eventTemplateID
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        $eventTemplateID,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $eventID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param string $eventTemplateID
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        $eventTemplateID,
        ?RequestOptions $requestOptions = null,
    ): EventDetail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDetailRaw(
        string $eventID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): EventDetail;
}
