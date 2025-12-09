<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\Inboxes\InboxGetParams;
use HubspotSDK\Conversations\Inboxes\InboxListParams;
use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\InboxesRawContract;

final class InboxesRawService implements InboxesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   defaultPageLength?: int,
     *   limit?: int,
     *   sort?: list<string>,
     * }|InboxListParams $params
     *
     * @return BaseResponse<Page<PublicInbox>>
     *
     * @throws APIException
     */
    public function list(
        array|InboxListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = InboxListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/inboxes',
            query: $parsed,
            options: $options,
            convert: PublicInbox::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{archived?: bool}|InboxGetParams $params
     *
     * @return BaseResponse<PublicInbox>
     *
     * @throws APIException
     */
    public function get(
        int $inboxID,
        array|InboxGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboxGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/inboxes/%1$s', $inboxID],
            query: $parsed,
            options: $options,
            convert: PublicInbox::class,
        );
    }
}
