<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteBatchParams;
use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface CallbacksContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallbackCompleteParams $params
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array|CallbackCompleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CallbackCompleteBatchParams $params
     *
     * @throws APIException
     */
    public function completeBatch(
        array|CallbackCompleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
