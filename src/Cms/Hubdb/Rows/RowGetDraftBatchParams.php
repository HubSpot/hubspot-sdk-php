<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Rows;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns rows in the draft version of the specified table, given a set of row IDs.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\RowsService::getDraftBatch()
 *
 * @phpstan-type RowGetDraftBatchParamsShape = array{inputs: list<string>}
 */
final class RowGetDraftBatchParams implements BaseModel
{
    /** @use SdkModel<RowGetDraftBatchParamsShape> */
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
     * `new RowGetDraftBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetDraftBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowGetDraftBatchParams)->withInputs(...)
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
