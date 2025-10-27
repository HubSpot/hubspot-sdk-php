<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\PartnerClients\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\SimplePublicObjectBatchInput;

/**
 * Update a batch of objects.
 *
 * @see HubspotSDK\CRM\Objects\PartnerClients\Batch->batchUpdate
 *
 * @phpstan-type batch_batch_update_params = array{
 *   inputs: list<SimplePublicObjectBatchInput>
 * }
 */
final class BatchBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<batch_batch_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Api(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new BatchBatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchBatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchBatchUpdateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInput> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInput> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
