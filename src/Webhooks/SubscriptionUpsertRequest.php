<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ObjectSubscriptionUpsertRequestShape from \HubSpotSDK\Webhooks\ObjectSubscriptionUpsertRequest
 * @phpstan-import-type AssociationSubscriptionUpsertRequestShape from \HubSpotSDK\Webhooks\AssociationSubscriptionUpsertRequest
 * @phpstan-import-type AppLifecycleEventSubscriptionUpsertRequestShape from \HubSpotSDK\Webhooks\AppLifecycleEventSubscriptionUpsertRequest
 * @phpstan-import-type ListMembershipSubscriptionUpsertRequestShape from \HubSpotSDK\Webhooks\ListMembershipSubscriptionUpsertRequest
 *
 * @phpstan-type SubscriptionUpsertRequestVariants = ObjectSubscriptionUpsertRequest|AssociationSubscriptionUpsertRequest|AppLifecycleEventSubscriptionUpsertRequest|ListMembershipSubscriptionUpsertRequest
 * @phpstan-type SubscriptionUpsertRequestShape = SubscriptionUpsertRequestVariants|ObjectSubscriptionUpsertRequestShape|AssociationSubscriptionUpsertRequestShape|AppLifecycleEventSubscriptionUpsertRequestShape|ListMembershipSubscriptionUpsertRequestShape
 */
final class SubscriptionUpsertRequest implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ObjectSubscriptionUpsertRequest::class,
            AssociationSubscriptionUpsertRequest::class,
            AppLifecycleEventSubscriptionUpsertRequest::class,
            ListMembershipSubscriptionUpsertRequest::class,
        ];
    }
}
