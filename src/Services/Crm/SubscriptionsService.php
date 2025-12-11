<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\SubscriptionsContract;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @api
     */
    public SubscriptionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscriptionsRawService($client);
    }

    /**
     * @api
     *
     * Cancel an active commerce subscription using the subscription ID.
     *
     * @param int $objectID subscription CRM id
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause an active subscription using the subscription ID.
     *
     * @param int $objectID subscription CRM id
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        ?string $pauseReason = null,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['pauseReason' => $pauseReason]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pause($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resume a previously paused subscription using the subscription ID.
     *
     * @param int $objectID subscription CRM id
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        int $proposedNextBillingDate,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['proposedNextBillingDate' => $proposedNextBillingDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unpause($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
