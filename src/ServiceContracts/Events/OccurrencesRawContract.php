<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Events;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams;
use HubSpotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
