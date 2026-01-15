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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ActorsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ActorBatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicActor>
     *
     * @throws APIException
     */
    public function batchRead(
        array|ActorBatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActorGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor,>
     *
     * @throws APIException
     */
    public function get(
        string $actorID,
        array|ActorGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
