<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams\Type;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TokensContract;

final class TokensService implements TokensContract
{
    /**
     * @api
     */
    public TokensRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TokensRawService($client);
    }

    /**
     * @api
     *
     * Update an existing event type template with new tokens.
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
    ): TimelineEventTemplateToken {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'label' => $label,
                'name' => $name,
                'type' => $type,
                'createdAt' => $createdAt,
                'objectPropertyName' => $objectPropertyName,
                'options' => $options,
                'updatedAt' => $updatedAt,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($eventTemplateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an event type template token, specified by token name.
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
    ): TimelineEventTemplateToken {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'eventTemplateID' => $eventTemplateID,
                'label' => $label,
                'objectPropertyName' => $objectPropertyName,
                'options' => $options,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($tokenName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing token from a specific event type template.
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
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'eventTemplateID' => $eventTemplateID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($tokenName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
