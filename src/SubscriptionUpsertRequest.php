<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ObjectSubscriptionUpsertRequestShape from \HubSpotSDK\ObjectSubscriptionUpsertRequest
 * @phpstan-import-type AssociationSubscriptionUpsertRequestShape from \HubSpotSDK\AssociationSubscriptionUpsertRequest
 * @phpstan-import-type AppLifecycleEventSubscriptionUpsertRequestShape from \HubSpotSDK\AppLifecycleEventSubscriptionUpsertRequest
 * @phpstan-import-type ListMembershipSubscriptionUpsertRequestShape from \HubSpotSDK\ListMembershipSubscriptionUpsertRequest
 * @phpstan-import-type GdprPrivacyDeletionSubscriptionUpsertRequestShape from \HubSpotSDK\GdprPrivacyDeletionSubscriptionUpsertRequest
 *
 * @phpstan-type SubscriptionUpsertRequestVariants = ObjectSubscriptionUpsertRequest|AssociationSubscriptionUpsertRequest|AppLifecycleEventSubscriptionUpsertRequest|ListMembershipSubscriptionUpsertRequest|GdprPrivacyDeletionSubscriptionUpsertRequest
 * @phpstan-type SubscriptionUpsertRequestShape = SubscriptionUpsertRequestVariants|ObjectSubscriptionUpsertRequestShape|AssociationSubscriptionUpsertRequestShape|AppLifecycleEventSubscriptionUpsertRequestShape|ListMembershipSubscriptionUpsertRequestShape|GdprPrivacyDeletionSubscriptionUpsertRequestShape
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
            GdprPrivacyDeletionSubscriptionUpsertRequest::class,
        ];
    }
}
