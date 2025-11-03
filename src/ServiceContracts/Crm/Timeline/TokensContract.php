<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams\Type;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface TokensContract
{
    /**
     * @api
     *
     * @param int $appID
     * @param string $label used for list segmentation and reporting
     * @param string $name The name of the token referenced in the templates. This must be unique for the specific template. It may only contain alphanumeric characters, periods, dashes, or underscores (. - _).
     * @param Type|value-of<Type> $type The data type of the token. You can currently choose from [string, number, date, enumeration].
     * @param \DateTimeInterface $createdAt The date and time that the Event Template Token was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     * @param string $objectPropertyName The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     * @param list<TimelineEventTemplateTokenOption> $options if type is `enumeration`, we should have a list of options to choose from
     * @param \DateTimeInterface $updatedAt The date and time that the Event Template Token was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        $appID,
        $label,
        $name,
        $type,
        $createdAt = omit,
        $objectPropertyName = omit,
        $options = omit,
        $updatedAt = omit,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $eventTemplateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param int $appID
     * @param string $eventTemplateID
     * @param string $label used for list segmentation and reporting
     * @param string $objectPropertyName The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     * @param list<TimelineEventTemplateTokenOption> $options if type is `enumeration`, we should have a list of options to choose from
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        $appID,
        $eventTemplateID,
        $label,
        $objectPropertyName = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $tokenName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param int $appID
     * @param string $eventTemplateID
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        $appID,
        $eventTemplateID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $tokenName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
