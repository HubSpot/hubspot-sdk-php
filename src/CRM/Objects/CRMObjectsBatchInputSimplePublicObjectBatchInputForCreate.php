<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_batch_input_simple_public_object_batch_input_for_create = array{
 *   inputs: list<CRMObjectsSimplePublicObjectBatchInputForCreate>
 * }
 */
final class CRMObjectsBatchInputSimplePublicObjectBatchInputForCreate implements BaseModel
{
    /**
     * @use SdkModel<crm_objects_batch_input_simple_public_object_batch_input_for_create>
     */
    use SdkModel;

    /** @var list<CRMObjectsSimplePublicObjectBatchInputForCreate> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new CRMObjectsBatchInputSimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsBatchInputSimplePublicObjectBatchInputForCreate::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsBatchInputSimplePublicObjectBatchInputForCreate)->withInputs(...)
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
     * @param list<CRMObjectsSimplePublicObjectBatchInputForCreate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectBatchInputForCreate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
