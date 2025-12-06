<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * Read a batch of deal split objects by their associated deal object internal ID.
 *
 * @see HubspotSDK\Services\Crm\Objects\DealSplitsService::batchRead()
 *
 * @phpstan-type DealSplitBatchReadParamsShape = array{
 *   inputs: list<PublicObjectID|array{id: string}>
 * }
 */
final class DealSplitBatchReadParams implements BaseModel
{
    /** @use SdkModel<DealSplitBatchReadParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicObjectID> $inputs */
    #[Api(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new DealSplitBatchReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealSplitBatchReadParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealSplitBatchReadParams)->withInputs(...)
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
     * @param list<PublicObjectID|array{id: string}> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicObjectID|array{id: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
