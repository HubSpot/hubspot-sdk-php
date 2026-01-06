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
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ActorsContract;

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
     * @param string $property Query param:
     *
     * @throws APIException
     */
    public function batchRead(
        array $inputs,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicActor {
        $params = ['inputs' => $inputs, 'property' => $property];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchRead(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor {
        $params = ['property' => $property];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($actorID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
