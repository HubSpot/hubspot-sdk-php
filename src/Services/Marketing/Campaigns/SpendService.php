<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\SpendContract;

final class SpendService implements SpendContract
{
    /**
     * @api
     */
    public SpendRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpendRawService($client);
    }

    /**
     * @api
     *
     * Create a new campaign spend item
     *
     * @param string $campaignGuid unique identifier for the campaign
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        $params = [
            'amount' => $amount,
            'name' => $name,
            'order' => $order,
            'description' => $description,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific campaign spend item by ID
     *
     * @param int $spendID path param: Unique identifier for the spend item
     * @param string $campaignGuid path param: Unique identifier for the campaign
     * @param float $amount Body param:
     * @param string $name Body param:
     * @param int $order Body param:
     * @param string $description Body param:
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        $params = [
            'campaignGuid' => $campaignGuid,
            'amount' => $amount,
            'name' => $name,
            'order' => $order,
            'description' => $description,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($spendID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific campaign spend item by ID
     *
     * @param int $spendID unique identifier for the spend item
     * @param string $campaignGuid unique identifier for the campaign
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['campaignGuid' => $campaignGuid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($spendID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a campaign spend item by its spendId
     *
     * @param int $spendID unique identifier for the spend item
     * @param string $campaignGuid unique identifier for the campaign
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem {
        $params = ['campaignGuid' => $campaignGuid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($spendID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
