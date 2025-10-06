<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_simple_public_object_batch_input_upsert = array{
 *   inputs: list<SimplePublicObjectBatchInputUpsert>
 * }
 */
final class BatchInputSimplePublicObjectBatchInputUpsert implements BaseModel
{
    /** @use SdkModel<batch_input_simple_public_object_batch_input_upsert> */
    use SdkModel;

    /** @var list<SimplePublicObjectBatchInputUpsert> $inputs */
    #[Api(list: SimplePublicObjectBatchInputUpsert::class)]
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
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
