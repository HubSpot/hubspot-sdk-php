<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams\Type;
use HubspotSDK\RequestOptions;

interface TokensContract
{
    /**
     * @api
     *
     * @param string $eventTemplateID path param: The event template ID
     * @param int $appID path param: The ID of the target app
     * @param string $label body param: Used for list segmentation and reporting
     * @param string $name Body param: The name of the token referenced in the templates. This must be unique for the specific template. It may only contain alphanumeric characters, periods, dashes, or underscores (. - _).
     * @param 'date'|'enumeration'|'number'|'string'|Type $type Body param: The data type of the token. You can currently choose from [string, number, date, enumeration].
     * @param string|\DateTimeInterface $createdAt Body param: The date and time that the Event Template Token was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     * @param string $objectPropertyName Body param: The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     * @param list<array{
     *   label: string, value: string
     * }|TimelineEventTemplateTokenOption> $options Body param: If type is `enumeration`, we should have a list of options to choose from
     * @param string|\DateTimeInterface $updatedAt Body param: The date and time that the Event Template Token was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        int $appID,
        string $label,
        string $name,
        string|Type $type,
        string|\DateTimeInterface|null $createdAt = null,
        ?string $objectPropertyName = null,
        ?array $options = null,
        string|\DateTimeInterface|null $updatedAt = null,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param string $tokenName path param: The token name
     * @param int $appID path param: The ID of the target app
     * @param string $eventTemplateID path param: The event template ID
     * @param string $label body param: Used for list segmentation and reporting
     * @param string $objectPropertyName Body param: The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     * @param list<array{
     *   label: string, value: string
     * }|TimelineEventTemplateTokenOption> $options Body param: If type is `enumeration`, we should have a list of options to choose from
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        int $appID,
        string $eventTemplateID,
        string $label,
        ?string $objectPropertyName = null,
        ?array $options = null,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param string $tokenName the token name
     * @param int $appID the ID of the target app
     * @param string $eventTemplateID the event template ID
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        int $appID,
        string $eventTemplateID,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
