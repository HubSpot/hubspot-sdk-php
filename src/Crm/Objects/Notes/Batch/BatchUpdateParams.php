<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Notes\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectBatchInput;

/**
 * Update a batch of notes by internal ID, or unique property values.
 *
 * @see HubspotSDK\Services\Crm\Objects\Notes\BatchService::update()
 *
 * @phpstan-type BatchUpdateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInput|array{
 *     id: string,
 *     properties: array<string,string>,
 *     idProperty?: string|null,
 *     objectWriteTraceID?: string|null,
 *   }>,
 * }
 */
final class BatchUpdateParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Required(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new BatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInput|array{
     *   id: string,
     *   properties: array<string,string>,
     *   idProperty?: string|null,
     *   objectWriteTraceID?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInput|array{
     *   id: string,
     *   properties: array<string,string>,
     *   idProperty?: string|null,
     *   objectWriteTraceID?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
