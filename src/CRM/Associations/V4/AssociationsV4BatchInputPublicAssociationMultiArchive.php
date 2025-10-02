<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type associations_v4_batch_input_public_association_multi_archive = array{
 *   inputs: list<AssociationsV4PublicAssociationMultiArchive>
 * }
 */
final class AssociationsV4BatchInputPublicAssociationMultiArchive implements BaseModel
{
    /**
     * @use SdkModel<associations_v4_batch_input_public_association_multi_archive>
     */
    use SdkModel;

    /** @var list<AssociationsV4PublicAssociationMultiArchive> $inputs */
    #[Api(list: AssociationsV4PublicAssociationMultiArchive::class)]
    public array $inputs;

    /**
     * `new AssociationsV4BatchInputPublicAssociationMultiArchive()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4BatchInputPublicAssociationMultiArchive::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4BatchInputPublicAssociationMultiArchive)->withInputs(...)
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
     * @param list<AssociationsV4PublicAssociationMultiArchive> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<AssociationsV4PublicAssociationMultiArchive> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
