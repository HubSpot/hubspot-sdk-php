<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Rows;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns rows in the published version of the specified table, given a set of row IDs.
 * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\RowsService::getBatch()
 *
 * @phpstan-type RowGetBatchParamsShape = array{inputs: list<string>}
 */
final class RowGetBatchParams implements BaseModel
{
    /** @use SdkModel<RowGetBatchParamsShape> */
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
     * `new RowGetBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowGetBatchParams)->withInputs(...)
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
