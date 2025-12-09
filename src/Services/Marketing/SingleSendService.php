<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\SingleSend\SingleSendSendParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\SingleSendContract;

final class SingleSendService implements SingleSendContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a template email to a specific recipient.
     *
     * @param array{
     *   emailID: int,
     *   message: array{
     *     to: string,
     *     bcc?: list<string>,
     *     cc?: list<string>,
     *     from?: string,
     *     replyTo?: list<string>,
     *     sendID?: string,
     *   },
     *   contactProperties?: array<string,string>,
     *   customProperties?: array<string,mixed>,
     * }|SingleSendSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|SingleSendSendParams $params,
        ?RequestOptions $requestOptions = null
    ): EmailSendStatusView {
        [$parsed, $options] = SingleSendSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<EmailSendStatusView> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v4/email/single-send',
            body: (object) $parsed,
            options: $options,
            convert: EmailSendStatusView::class,
        );

        return $response->parse();
    }
}
