<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\LinksContract;

final class LinksService implements LinksContract
{
    /**
     * @api
     */
    public LinksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LinksRawService($client);
    }

    /**
     * @api
     *
     * @param 'EMAIL'|Channel $channel Query param:
     * @param string $subscriberIDString Body param:
     * @param int $businessUnitID Query param:
     * @param string $language Body param:
     * @param int $subscriptionID Body param:
     *
     * @throws APIException
     */
    public function create(
        string|Channel $channel,
        string $subscriberIDString,
        int $businessUnitID = 0,
        ?string $language = null,
        ?int $subscriptionID = null,
        ?RequestOptions $requestOptions = null,
    ): LinkGenerationResponse {
        $params = [
            'channel' => $channel,
            'subscriberIDString' => $subscriberIDString,
            'businessUnitID' => $businessUnitID,
            'language' => $language,
            'subscriptionID' => $subscriptionID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
