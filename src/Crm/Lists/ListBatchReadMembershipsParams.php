<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::batchReadMemberships()
 *
 * @phpstan-import-type RecordIDInputShape from \HubSpotSDK\Crm\Lists\RecordIDInput
 *
 * @phpstan-type ListBatchReadMembershipsParamsShape = array{
 *   inputs: list<RecordIDInput|RecordIDInputShape>
 * }
 */
final class ListBatchReadMembershipsParams implements BaseModel
{
    /** @use SdkModel<ListBatchReadMembershipsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<RecordIDInput> $inputs */
    #[Required(list: RecordIDInput::class)]
    public array $inputs;

    /**
     * `new ListBatchReadMembershipsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListBatchReadMembershipsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListBatchReadMembershipsParams)->withInputs(...)
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
     * @param list<RecordIDInput|RecordIDInputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<RecordIDInput|RecordIDInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
