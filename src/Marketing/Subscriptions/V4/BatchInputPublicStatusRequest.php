<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\StatusState;

/**
 * @phpstan-type BatchInputPublicStatusRequestShape = array{
 *   inputs: list<PublicStatusRequest>
 * }
 */
final class BatchInputPublicStatusRequest implements BaseModel
{
    /** @use SdkModel<BatchInputPublicStatusRequestShape> */
    use SdkModel;

    /** @var list<PublicStatusRequest> $inputs */
    #[Required(list: PublicStatusRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicStatusRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicStatusRequest)->withInputs(...)
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
