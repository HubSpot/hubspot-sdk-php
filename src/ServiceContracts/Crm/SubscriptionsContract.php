<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        ?string $pauseReason = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        int $proposedNextBillingDate,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
