<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnpauseRequestShape = array{proposedNextBillingDate: int}
 */
final class UnpauseRequest implements BaseModel
{
    /** @use SdkModel<UnpauseRequestShape> */
    use SdkModel;

    #[Api]
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
        $obj = new self;

        $obj->proposedNextBillingDate = $proposedNextBillingDate;

        return $obj;
    }

    public function withProposedNextBillingDate(
        int $proposedNextBillingDate
    ): self {
        $obj = clone $this;
        $obj->proposedNextBillingDate = $proposedNextBillingDate;

        return $obj;
    }
}
