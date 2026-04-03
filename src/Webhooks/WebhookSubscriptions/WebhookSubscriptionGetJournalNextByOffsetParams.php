<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Webhooks\WebhookSubscriptionsService::getJournalNextByOffset()
 *
 * @phpstan-type WebhookSubscriptionGetJournalNextByOffsetParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookSubscriptionGetJournalNextByOffsetParams implements BaseModel
{
    /** @use SdkModel<WebhookSubscriptionGetJournalNextByOffsetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $installPortalID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $installPortalID = null): self
    {
        $self = new self;

        null !== $installPortalID && $self['installPortalID'] = $installPortalID;

        return $self;
    }

    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
