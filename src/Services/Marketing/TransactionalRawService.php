<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\EmailSendStatusView;
use HubspotSDK\Marketing\Transactional\PublicSingleSendEmail;
use HubspotSDK\Marketing\Transactional\TransactionalSendParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\TransactionalRawContract;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubspotSDK\Marketing\Transactional\PublicSingleSendEmail
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TransactionalRawService implements TransactionalRawContract
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
     *   contactProperties: array<string,string>,
     *   customProperties: array<string,mixed>,
     *   emailID: int,
     *   message: PublicSingleSendEmail|PublicSingleSendEmailShape,
     * }|TransactionalSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransactionalSendParams::parseRequest(
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
