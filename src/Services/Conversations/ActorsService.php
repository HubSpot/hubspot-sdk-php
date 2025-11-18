<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\Actors\ActorBatchReadParams;
use HubspotSDK\Conversations\Actors\ActorGetParams;
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
     * @param array{
     *   inputs: list<string>, property?: string
     * }|ActorBatchReadParams $params
     *
     * @throws APIException
     */
    public function batchRead(
        array|ActorBatchReadParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicActor {
        [$parsed, $options] = ActorBatchReadParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['property'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'conversations/v3/conversations/actors/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicActor::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single actor using the actor ID.
     *
     * @param array{property?: string}|ActorGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        array|ActorGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor {
        [$parsed, $options] = ActorGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/actors/%1$s', $actorID],
            query: $parsed,
            options: $options,
            convert: PublicActor::class,
        );
    }
}
