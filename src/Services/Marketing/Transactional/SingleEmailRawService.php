<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Transactional;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\PublicSingleSendEmail;
use HubspotSDK\Marketing\Transactional\SingleEmail\SingleEmailSendParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Transactional\SingleEmailRawContract;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubspotSDK\Marketing\PublicSingleSendEmail
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SingleEmailRawService implements SingleEmailRawContract
{
    // @phpstan-ignore-next-line
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
     *   contactProperties: array<string,string>,
     *   customProperties: array<string,mixed>,
     *   emailID: int,
     *   message: PublicSingleSendEmail|PublicSingleSendEmailShape,
     * }|SingleEmailSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function send(
        array|SingleEmailSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SingleEmailSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/transactional/2026-03/single-email/send',
            body: (object) $parsed,
            options: $options,
            convert: EmailSendStatusView::class,
        );
    }
}
