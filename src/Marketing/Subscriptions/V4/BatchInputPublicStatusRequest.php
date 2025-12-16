<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest
 *
 * @phpstan-type BatchInputPublicStatusRequestShape = array{
 *   inputs: list<PublicStatusRequestShape>
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
