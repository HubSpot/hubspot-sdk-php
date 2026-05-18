<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubSpotSDK\Crm\PublicFetchAssociationsBatchRequest
 *
 * @phpstan-type BatchInputPublicFetchAssociationsBatchRequestShape = array{
 *   inputs: list<PublicFetchAssociationsBatchRequest|PublicFetchAssociationsBatchRequestShape>,
 * }
 */
final class BatchInputPublicFetchAssociationsBatchRequest implements BaseModel
{
    /** @use SdkModel<BatchInputPublicFetchAssociationsBatchRequestShape> */
    use SdkModel;

    /** @var list<PublicFetchAssociationsBatchRequest> $inputs */
    #[Required(list: PublicFetchAssociationsBatchRequest::class)]
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
     * @param list<PublicFetchAssociationsBatchRequest|PublicFetchAssociationsBatchRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicFetchAssociationsBatchRequest|PublicFetchAssociationsBatchRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
