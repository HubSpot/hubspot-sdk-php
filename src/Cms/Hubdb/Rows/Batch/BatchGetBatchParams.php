<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns rows in the published version of the specified table, given a set of row IDs.
 * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\Rows\BatchService::getBatch()
 *
 * @phpstan-type BatchGetBatchParamsShape = array{inputs: list<string>}
 */
final class BatchGetBatchParams implements BaseModel
{
    /** @use SdkModel<BatchGetBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * `new BatchGetBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetBatchParams)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
