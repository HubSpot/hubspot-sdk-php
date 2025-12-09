<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicFetchAssociationsBatchRequestShape = array{
 *   inputs: list<PublicFetchAssociationsBatchRequest>
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
     * @param list<PublicFetchAssociationsBatchRequest|array{
     *   id: string, after?: string|null
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicFetchAssociationsBatchRequest|array{
     *   id: string, after?: string|null
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
