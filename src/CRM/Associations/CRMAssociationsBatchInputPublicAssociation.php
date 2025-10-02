<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_associations_batch_input_public_association = array{
 *   inputs: list<CRMAssociationsPublicAssociation>
 * }
 */
final class CRMAssociationsBatchInputPublicAssociation implements BaseModel
{
    /** @use SdkModel<crm_associations_batch_input_public_association> */
    use SdkModel;

    /** @var list<CRMAssociationsPublicAssociation> $inputs */
    #[Api(list: CRMAssociationsPublicAssociation::class)]
    public array $inputs;

    /**
     * `new CRMAssociationsBatchInputPublicAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMAssociationsBatchInputPublicAssociation::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMAssociationsBatchInputPublicAssociation)->withInputs(...)
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
     * @param list<CRMAssociationsPublicAssociation> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMAssociationsPublicAssociation> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
