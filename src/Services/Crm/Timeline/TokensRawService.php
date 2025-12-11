<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams\Type;
use HubspotSDK\Crm\Timeline\Tokens\TokenDeleteParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\TokensRawContract;

final class TokensRawService implements TokensRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update an existing event type template with new tokens.
     *
     * @param string $eventTemplateID path param: The event template ID
     * @param array{
     *   appID: int,
     *   label: string,
     *   name: string,
     *   type: 'date'|'enumeration'|'number'|'string'|Type,
     *   createdAt?: string|\DateTimeInterface,
     *   objectPropertyName?: string,
     *   options?: list<array{
     *     label: string, value: string
     *   }|TimelineEventTemplateTokenOption>,
     *   updatedAt?: string|\DateTimeInterface,
     * }|TokenCreateParams $params
     *
     * @return BaseResponse<TimelineEventTemplateToken>
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        array|TokenCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'integrators/timeline/v3/%1$s/event-templates/%2$s/tokens',
                $appID,
                $eventTemplateID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: TimelineEventTemplateToken::class,
        );
    }

    /**
     * @api
     *
     * Update an event type template token, specified by token name.
     *
     * @param string $tokenName path param: The token name
     * @param array{
     *   appID: int,
     *   eventTemplateID: string,
     *   label: string,
     *   objectPropertyName?: string,
     *   options?: list<array{
     *     label: string, value: string
     *   }|TimelineEventTemplateTokenOption>,
     * }|TokenUpdateParams $params
     *
     * @return BaseResponse<TimelineEventTemplateToken>
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        array|TokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $tokenName the token name
     * @param array{appID: int, eventTemplateID: string}|TokenDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        array|TokenDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line return.type
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
