<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\Actors\ActorBatchReadParams;
use HubspotSDK\Conversations\AgentActor;
use HubspotSDK\Conversations\BatchResponsePublicActor;
use HubspotSDK\Conversations\BotActor;
use HubspotSDK\Conversations\EmailActor;
use HubspotSDK\Conversations\IntegratorActor;
use HubspotSDK\Conversations\LlmActor;
use HubspotSDK\Conversations\PublicActor;
use HubspotSDK\Conversations\SystemActor;
use HubspotSDK\Conversations\VisitorActor;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ActorsContract;

final class ActorsService implements ActorsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Resolve a set of `ActorId`s to the underlying actors/participants.
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function batchRead(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicActor {
        $params = ['inputs' => $inputs];

        return $this->batchReadRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchReadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicActor {
        [$parsed, $options] = ActorBatchReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'conversations/v3/conversations/actors/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicActor::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single actor using the actor ID.
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        ?RequestOptions $requestOptions = null
    ): AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/actors/%1$s', $actorID],
            options: $requestOptions,
            convert: PublicActor::class,
        );
    }
}
