<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Subscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Resume a previously paused subscription using the subscription ID.
 *
 * @see HubspotSDK\Services\Crm\SubscriptionsService::unpause()
 *
 * @phpstan-type SubscriptionUnpauseParamsShape = array{
 *   proposedNextBillingDate: int
 * }
 */
final class SubscriptionUnpauseParams implements BaseModel
{
    /** @use SdkModel<SubscriptionUnpauseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $proposedNextBillingDate;

    /**
     * `new SubscriptionUnpauseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionUnpauseParams::with(proposedNextBillingDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionUnpauseParams)->withProposedNextBillingDate(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $proposedNextBillingDate): self
    {
        $self = new self;

        $self['proposedNextBillingDate'] = $proposedNextBillingDate;

        return $self;
    }

    public function withProposedNextBillingDate(
        int $proposedNextBillingDate
    ): self {
        $self = clone $this;
        $self['proposedNextBillingDate'] = $proposedNextBillingDate;

        return $self;
    }
}
