<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

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

interface ActorsContract
{
    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function batchRead(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicActor;

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
    ): BatchResponsePublicActor;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        ?RequestOptions $requestOptions = null
    ): AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor;
}
