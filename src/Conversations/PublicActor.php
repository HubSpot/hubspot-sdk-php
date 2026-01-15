<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type AgentActorShape from \HubspotSDK\Conversations\AgentActor
 * @phpstan-import-type BotActorShape from \HubspotSDK\Conversations\BotActor
 * @phpstan-import-type IntegratorActorShape from \HubspotSDK\Conversations\IntegratorActor
 * @phpstan-import-type SystemActorShape from \HubspotSDK\Conversations\SystemActor
 * @phpstan-import-type VisitorActorShape from \HubspotSDK\Conversations\VisitorActor
 * @phpstan-import-type EmailActorShape from \HubspotSDK\Conversations\EmailActor
 * @phpstan-import-type LlmActorShape from \HubspotSDK\Conversations\LlmActor
 *
 * @phpstan-type PublicActorVariants = AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor
 * @phpstan-type PublicActorShape = PublicActorVariants|AgentActorShape|BotActorShape|IntegratorActorShape|SystemActorShape|VisitorActorShape|EmailActorShape|LlmActorShape
 */
final class PublicActor implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            AgentActor::class,
            BotActor::class,
            IntegratorActor::class,
            SystemActor::class,
            VisitorActor::class,
            EmailActor::class,
            LlmActor::class,
        ];
    }
}
