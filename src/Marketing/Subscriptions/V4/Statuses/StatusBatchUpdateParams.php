<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\StatusState;

/**
 * Update the subscription status for a set of contacts.
 *
 * @see HubspotSDK\Services\Marketing\Subscriptions\V4\StatusesService::batchUpdate()
 *
 * @phpstan-type StatusBatchUpdateParamsShape = array{
 *   inputs: list<PublicStatusRequest|array{
 *     channel: value-of<Channel>,
 *     statusState: value-of<StatusState>,
 *     subscriberIdString: string,
 *     subscriptionId: int,
 *     legalBasis?: value-of<LegalBasis>|null,
 *     legalBasisExplanation?: string|null,
 *   }>,
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
     * @param list<PublicStatusRequest|array{
     *   channel: value-of<Channel>,
     *   statusState: value-of<StatusState>,
     *   subscriberIdString: string,
     *   subscriptionId: int,
     *   legalBasis?: value-of<LegalBasis>|null,
     *   legalBasisExplanation?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicStatusRequest|array{
     *   channel: value-of<Channel>,
     *   statusState: value-of<StatusState>,
     *   subscriberIdString: string,
     *   subscriptionId: int,
     *   legalBasis?: value-of<LegalBasis>|null,
     *   legalBasisExplanation?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
