<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\EmailSendStatusView;
use HubspotSDK\Marketing\Transactional\TransactionalSendParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TransactionalRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TransactionalSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
