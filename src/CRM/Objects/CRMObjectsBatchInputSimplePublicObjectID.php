<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_batch_input_simple_public_object_id = array{
 *   inputs: list<CRMObjectsSimplePublicObjectID>
 * }
 */
final class CRMObjectsBatchInputSimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<crm_objects_batch_input_simple_public_object_id> */
    use SdkModel;

    /** @var list<CRMObjectsSimplePublicObjectID> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new CRMObjectsBatchInputSimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsBatchInputSimplePublicObjectID::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsBatchInputSimplePublicObjectID)->withInputs(...)
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
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
