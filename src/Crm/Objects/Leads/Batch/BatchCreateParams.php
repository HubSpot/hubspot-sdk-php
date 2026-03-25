<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Leads\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;

/**
 * Create multiple lead records in a single request by providing a batch of lead data. This endpoint allows for efficient creation of leads by processing them together, which can be useful for syncing data from other systems or importing large datasets.
 *
 * @see HubspotSDK\Services\Crm\Objects\Leads\BatchService::create()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Required(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
