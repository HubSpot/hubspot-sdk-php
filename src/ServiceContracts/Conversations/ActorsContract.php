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
     * @param list<string> $inputs body param: Strings to input
     * @param string $property Query param:
     *
     * @throws APIException
     */
    public function batchRead(
        array $inputs,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicActor;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor;
}
