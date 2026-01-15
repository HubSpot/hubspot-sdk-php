<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\AgentActor;
use HubspotSDK\Conversations\BatchResponsePublicActor;
use HubspotSDK\Conversations\BotActor;
use HubspotSDK\Conversations\EmailActor;
use HubspotSDK\Conversations\IntegratorActor;
use HubspotSDK\Conversations\LlmActor;
use HubspotSDK\Conversations\SystemActor;
use HubspotSDK\Conversations\VisitorActor;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ActorsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ActorsService implements ActorsContract
{
    /**
     * @api
     */
    public ActorsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActorsRawService($client);
    }

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param string $property Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchRead(
        array $inputs,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicActor {
        $params = Util::removeNulls(['inputs' => $inputs, 'property' => $property]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchRead(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor {
        $params = Util::removeNulls(['property' => $property]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($actorID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
