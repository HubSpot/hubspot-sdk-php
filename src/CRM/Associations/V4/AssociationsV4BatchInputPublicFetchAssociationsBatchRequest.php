<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type associations_v4_batch_input_public_fetch_associations_batch_request = array{
 *   inputs: list<AssociationsV4PublicFetchAssociationsBatchRequest>
 * }
 */
final class AssociationsV4BatchInputPublicFetchAssociationsBatchRequest implements BaseModel
{
    /**
     * @use SdkModel<associations_v4_batch_input_public_fetch_associations_batch_request>
     */
    use SdkModel;

    /** @var list<AssociationsV4PublicFetchAssociationsBatchRequest> $inputs */
    #[Api(list: AssociationsV4PublicFetchAssociationsBatchRequest::class)]
    public array $inputs;

    /**
     * `new AssociationsV4BatchInputPublicFetchAssociationsBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4BatchInputPublicFetchAssociationsBatchRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4BatchInputPublicFetchAssociationsBatchRequest)
     *   ->withInputs(...)
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
     * @param list<AssociationsV4PublicFetchAssociationsBatchRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<AssociationsV4PublicFetchAssociationsBatchRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
