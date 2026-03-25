<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubspotSDK\Events\Occurrences\OccurrenceListParams;
use HubspotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface OccurrencesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OccurrenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalUnifiedEvent>>
     *
     * @throws APIException
     */
    public function list(
        array|OccurrenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VisibleExternalEventTypeNames>
     *
     * @throws APIException
     */
    public function listEventTypes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
