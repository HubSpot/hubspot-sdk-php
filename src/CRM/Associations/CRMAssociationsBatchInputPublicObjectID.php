<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMPublicObjectID;

/**
 * @phpstan-type crm_associations_batch_input_public_object_id = array{
 *   inputs: list<CRMPublicObjectID>
 * }
 */
final class CRMAssociationsBatchInputPublicObjectID implements BaseModel
{
    /** @use SdkModel<crm_associations_batch_input_public_object_id> */
    use SdkModel;

    /** @var list<CRMPublicObjectID> $inputs */
    #[Api(list: CRMPublicObjectID::class)]
    public array $inputs;

    /**
     * `new CRMAssociationsBatchInputPublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMAssociationsBatchInputPublicObjectID::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMAssociationsBatchInputPublicObjectID)->withInputs(...)
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
     * @param list<CRMPublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMPublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
