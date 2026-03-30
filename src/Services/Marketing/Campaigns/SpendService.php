<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\SpendContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * @param float $amount the monetary value of the spend item
     * @param string $name the name of the spend item
     * @param int $order the sequence number indicating the order of the spend item
     * @param string $description a brief description of the spend item
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSpendItem {
        $params = Util::removeNulls(
            [
                'amount' => $amount,
                'name' => $name,
                'order' => $order,
                'description' => $description,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific campaign spend item by ID
     *
     * @param int $spendID Path param
     * @param string $campaignGuid Path param
     * @param float $amount body param: The monetary value of the spend item
     * @param string $name body param: The name of the spend item
     * @param int $order body param: The sequence number indicating the order of the spend item
     * @param string $description body param: A brief description of the spend item
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): PublicSpendItem {
        $params = Util::removeNulls(
            [
                'campaignGuid' => $campaignGuid,
                'amount' => $amount,
                'name' => $name,
                'order' => $order,
                'description' => $description,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($spendID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific campaign spend item by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['campaignGuid' => $campaignGuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($spendID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a campaign spend item by its spendId
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSpendItem {
        $params = Util::removeNulls(['campaignGuid' => $campaignGuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($spendID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
