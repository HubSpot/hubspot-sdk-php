<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_public_fetch_associations_batch_request = array{
 *   inputs: list<PublicFetchAssociationsBatchRequest>
 * }
 */
final class BatchInputPublicFetchAssociationsBatchRequest implements BaseModel
{
    /** @use SdkModel<batch_input_public_fetch_associations_batch_request> */
    use SdkModel;

    /** @var list<PublicFetchAssociationsBatchRequest> $inputs */
    #[Api(list: PublicFetchAssociationsBatchRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicFetchAssociationsBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicFetchAssociationsBatchRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicFetchAssociationsBatchRequest)->withInputs(...)
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
     * @param list<PublicFetchAssociationsBatchRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicFetchAssociationsBatchRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
