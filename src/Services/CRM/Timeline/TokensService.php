<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Timeline\TimelineEventTemplateToken;
use HubspotSDK\CRM\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\CRM\Timeline\Tokens\TokenCreateParams;
use HubspotSDK\CRM\Timeline\Tokens\TokenCreateParams\Type;
use HubspotSDK\CRM\Timeline\Tokens\TokenDeleteParams;
use HubspotSDK\CRM\Timeline\Tokens\TokenUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Timeline\TokensContract;

use const HubspotSDK\Core\OMIT as omit;

final class TokensService implements TokensContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update an existing event type template with new tokens.
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
    ): TimelineEventTemplateToken {
        $params = [
            'appID' => $appID,
            'label' => $label,
            'name' => $name,
            'type' => $type,
            'createdAt' => $createdAt,
            'objectPropertyName' => $objectPropertyName,
            'options' => $options,
            'updatedAt' => $updatedAt,
        ];

        return $this->createRaw($eventTemplateID, $params, $requestOptions);
    }

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
    ): TimelineEventTemplateToken {
        [$parsed, $options] = TokenCreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s/tokens',
                $appID,
                $eventTemplateID,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: TimelineEventTemplateToken::class,
        );
    }

    /**
     * @api
     *
     * Update an event type template token, specified by token name.
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
    ): TimelineEventTemplateToken {
        $params = [
            'appID' => $appID,
            'eventTemplateID' => $eventTemplateID,
            'label' => $label,
            'objectPropertyName' => $objectPropertyName,
            'options' => $options,
        ];

        return $this->updateRaw($tokenName, $params, $requestOptions);
    }

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
    ): TimelineEventTemplateToken {
        [$parsed, $options] = TokenUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s/tokens/%3$s',
                $appID,
                $eventTemplateID,
                $tokenName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appID', 'eventTemplateID'])
            ),
            options: $options,
            convert: TimelineEventTemplateToken::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing token from a specific event type template.
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
    ): mixed {
        $params = ['appID' => $appID, 'eventTemplateID' => $eventTemplateID];

        return $this->deleteRaw($tokenName, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = TokenDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s/tokens/%3$s',
                $appID,
                $eventTemplateID,
                $tokenName,
            ],
            options: $options,
            convert: null,
        );
    }
}
