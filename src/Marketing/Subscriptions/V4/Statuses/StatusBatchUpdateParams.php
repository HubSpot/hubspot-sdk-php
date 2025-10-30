<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;

/**
 * Update the subscription status for a set of contacts.
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->batchUpdate
 *
 * @phpstan-type StatusBatchUpdateParamsShape = array{
 *   inputs: list<PublicStatusRequest>
 * }
 */
final class StatusBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<StatusBatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicStatusRequest> $inputs */
    #[Api(list: PublicStatusRequest::class)]
    public array $inputs;

    /**
     * `new StatusBatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusBatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusBatchUpdateParams)->withInputs(...)
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
     *
     * @param list<PublicStatusRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicStatusRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
