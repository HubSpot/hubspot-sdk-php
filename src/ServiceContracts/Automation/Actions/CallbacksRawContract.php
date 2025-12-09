<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteBatchParams;
use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface CallbacksRawContract
{
    /**
     * @api
     *
     * @param string $callbackID the ID of the action execution
     * @param array<mixed>|CallbackCompleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array|CallbackCompleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallbackCompleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function completeBatch(
        array|CallbackCompleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
