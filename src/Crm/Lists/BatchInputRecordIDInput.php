<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RecordIDInputShape from \HubspotSDK\Crm\Lists\RecordIDInput
 *
 * @phpstan-type BatchInputRecordIDInputShape = array{
 *   inputs: list<RecordIDInput|RecordIDInputShape>
 * }
 */
final class BatchInputRecordIDInput implements BaseModel
{
    /** @use SdkModel<BatchInputRecordIDInputShape> */
    use SdkModel;

    /** @var list<RecordIDInput> $inputs */
    #[Required(list: RecordIDInput::class)]
    public array $inputs;

    /**
     * `new BatchInputRecordIDInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputRecordIDInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputRecordIDInput)->withInputs(...)
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
