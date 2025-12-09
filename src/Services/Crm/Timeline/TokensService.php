<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenDeleteParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TokensContract;

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
     * @param array{
     *   appId: int,
     *   label: string,
     *   name: string,
     *   type: 'date'|'enumeration'|'number'|'string',
     *   createdAt?: string|\DateTimeInterface,
     *   objectPropertyName?: string,
     *   options?: list<array{
     *     label: string, value: string
     *   }|TimelineEventTemplateTokenOption>,
     *   updatedAt?: string|\DateTimeInterface,
     * }|TokenCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        array|TokenCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken {
        [$parsed, $options] = TokenCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        /** @var BaseResponse<TimelineEventTemplateToken> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s/tokens',
                $appID,
                $eventTemplateID,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: TimelineEventTemplateToken::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an event type template token, specified by token name.
     *
     * @param array{
     *   appId: int,
     *   eventTemplateId: string,
     *   label: string,
     *   objectPropertyName?: string,
     *   options?: list<array{
     *     label: string, value: string
     *   }|TimelineEventTemplateTokenOption>,
     * }|TokenUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        array|TokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken {
        [$parsed, $options] = TokenUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $eventTemplateID = $parsed['eventTemplateId'];
        unset($parsed['eventTemplateId']);

        /** @var BaseResponse<TimelineEventTemplateToken> */
        $response = $this->client->request(
            method: 'put',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s/tokens/%3$s',
                $appID,
                $eventTemplateID,
                $tokenName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appId', 'eventTemplateId'])
            ),
            options: $options,
            convert: TimelineEventTemplateToken::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing token from a specific event type template.
     *
     * @param array{appId: int, eventTemplateId: string}|TokenDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        array|TokenDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TokenDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $eventTemplateID = $parsed['eventTemplateId'];
        unset($parsed['eventTemplateId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
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

        return $response->parse();
    }
}
