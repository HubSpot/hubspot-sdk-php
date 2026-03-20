<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 *
 * @phpstan-type BatchInputSimplePublicObjectBatchInputUpsertShape = array{
 *   inputs: list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape>,
 * }
 */
final class BatchInputSimplePublicObjectBatchInputUpsert implements BaseModel
{
    /** @use SdkModel<BatchInputSimplePublicObjectBatchInputUpsertShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectBatchInputUpsert> $inputs */
    #[Required(list: SimplePublicObjectBatchInputUpsert::class)]
    public array $inputs;

    /**
     * `new BatchInputSimplePublicObjectBatchInputUpsert()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputSimplePublicObjectBatchInputUpsert::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputSimplePublicObjectBatchInputUpsert)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
