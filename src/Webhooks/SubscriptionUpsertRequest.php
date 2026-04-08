<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ObjectSubscriptionUpsertRequestShape from \HubspotSDK\Webhooks\ObjectSubscriptionUpsertRequest
 * @phpstan-import-type AssociationSubscriptionUpsertRequestShape from \HubspotSDK\Webhooks\AssociationSubscriptionUpsertRequest
 * @phpstan-import-type AppLifecycleEventSubscriptionUpsertRequestShape from \HubspotSDK\Webhooks\AppLifecycleEventSubscriptionUpsertRequest
 * @phpstan-import-type ListMembershipSubscriptionUpsertRequestShape from \HubspotSDK\Webhooks\ListMembershipSubscriptionUpsertRequest
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
