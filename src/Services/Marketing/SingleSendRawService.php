<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\EmailSendStatusView;
use HubSpotSDK\Marketing\PublicSingleSendEmail;
use HubSpotSDK\Marketing\SingleSend\SingleSendCreateParams;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\SingleSendRawContract;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubSpotSDK\Marketing\PublicSingleSendEmail
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
