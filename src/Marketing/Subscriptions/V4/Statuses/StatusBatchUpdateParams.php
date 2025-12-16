<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;

/**
 * Update the subscription status for a set of contacts.
 *
 * @see HubspotSDK\Services\Marketing\Subscriptions\V4\StatusesService::batchUpdate()
 *
 * @phpstan-import-type PublicStatusRequestShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest
 *
 * @phpstan-type StatusBatchUpdateParamsShape = array{
 *   inputs: list<PublicStatusRequestShape>
 * }
 */
final class StatusBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<StatusBatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicStatusRequest> $inputs */
    #[Required(list: PublicStatusRequest::class)]
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
     * @param list<PublicStatusRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicStatusRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
