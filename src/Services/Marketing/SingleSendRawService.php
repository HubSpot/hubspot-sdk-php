<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\PublicSingleSendEmail;
use HubspotSDK\Marketing\SingleSend\SingleSendCreateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\SingleSendRawContract;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubspotSDK\Marketing\PublicSingleSendEmail
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SingleSendRawService implements SingleSendRawContract
{
    // @phpstan-ignore-next-line
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
     *   contactProperties: array<string,string>,
     *   customProperties: array<string,mixed>,
     *   emailID: int,
     *   message: PublicSingleSendEmail|PublicSingleSendEmailShape,
     * }|SingleSendCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function create(
        array|SingleSendCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SingleSendCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/email-campaigns/2026-03/single-send',
            body: (object) $parsed,
            options: $options,
            convert: EmailSendStatusView::class,
        );
    }
}
