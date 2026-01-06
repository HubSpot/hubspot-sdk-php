<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\Actors\ActorBatchReadParams;
use HubspotSDK\Conversations\Actors\ActorGetParams;
use HubspotSDK\Conversations\AgentActor;
use HubspotSDK\Conversations\BatchResponsePublicActor;
use HubspotSDK\Conversations\BotActor;
use HubspotSDK\Conversations\EmailActor;
use HubspotSDK\Conversations\IntegratorActor;
use HubspotSDK\Conversations\LlmActor;
use HubspotSDK\Conversations\SystemActor;
use HubspotSDK\Conversations\VisitorActor;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ActorsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActorBatchReadParams $params
     *
     * @return BaseResponse<BatchResponsePublicActor>
     *
     * @throws APIException
     */
    public function batchRead(
        array|ActorBatchReadParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActorGetParams $params
     *
     * @return BaseResponse<AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor,>
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        array|ActorGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
