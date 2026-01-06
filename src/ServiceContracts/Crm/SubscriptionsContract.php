<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        ?string $pauseReason = null,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        int $proposedNextBillingDate,
        ?RequestOptions $requestOptions = null,
    ): string;
}
