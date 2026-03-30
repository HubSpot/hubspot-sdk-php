<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\DealSplits\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * Read a batch of deal split objects by their associated deal object internal ID.
 *
 * @see HubspotSDK\Services\Crm\DealSplits\BatchService::read()
 *
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 *
 * @phpstan-type BatchReadParamsShape = array{
 *   inputs: list<PublicObjectID|PublicObjectIDShape>
 * }
 */
final class BatchReadParams implements BaseModel
{
    /** @use SdkModel<BatchReadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of deal split inputs.
     *
     * @var list<PublicObjectID> $inputs
     */
    #[Required(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadParams)->withInputs(...)
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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of deal split inputs.
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
