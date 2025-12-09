<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Subscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnpauseRequestShape = array{proposedNextBillingDate: int}
 */
final class UnpauseRequest implements BaseModel
{
    /** @use SdkModel<UnpauseRequestShape> */
    use SdkModel;

    #[Required]
    public int $proposedNextBillingDate;

    /**
     * `new UnpauseRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnpauseRequest::with(proposedNextBillingDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnpauseRequest)->withProposedNextBillingDate(...)
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
