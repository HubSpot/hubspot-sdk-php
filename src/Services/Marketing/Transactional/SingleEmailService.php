<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Transactional;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\Transactional\SingleEmail\SingleEmailSendParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Transactional\SingleEmailContract;

final class SingleEmailService implements SingleEmailContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Asynchronously send a transactional email. Returns the status of the email send with a statusId that can be used to continuously query for the status using the Email Send Status API.
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
     * }|SingleEmailSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|SingleEmailSendParams $params,
        ?RequestOptions $requestOptions = null
    ): EmailSendStatusView {
        [$parsed, $options] = SingleEmailSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<EmailSendStatusView> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/transactional/single-email/send',
            body: (object) $parsed,
            options: $options,
            convert: EmailSendStatusView::class,
        );

        return $response->parse();
    }
}
