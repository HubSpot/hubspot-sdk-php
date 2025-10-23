<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<BehavioralEventHTTPCompletionRequest> $inputs
     *
     * @throws APIException
     */
    public function send(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
