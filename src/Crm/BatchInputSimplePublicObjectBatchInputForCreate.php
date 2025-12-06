<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputSimplePublicObjectBatchInputForCreateShape = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate>
 * }
 */
final class BatchInputSimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<BatchInputSimplePublicObjectBatchInputForCreateShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Api(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new BatchInputSimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputSimplePublicObjectBatchInputForCreate::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputSimplePublicObjectBatchInputForCreate)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate|array{
     *   associations: list<PublicAssociationsForObject>,
     *   properties: array<string,string>,
     *   objectWriteTraceId?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInputForCreate|array{
     *   associations: list<PublicAssociationsForObject>,
     *   properties: array<string,string>,
     *   objectWriteTraceId?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
