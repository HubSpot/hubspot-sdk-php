<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationShape from \HubspotSDK\Crm\Associations\PublicAssociation
 *
 * @phpstan-type BatchInputPublicAssociationShape = array{
 *   inputs: list<PublicAssociationShape>
 * }
 */
final class BatchInputPublicAssociation implements BaseModel
{
    /** @use SdkModel<BatchInputPublicAssociationShape> */
    use SdkModel;

    /** @var list<PublicAssociation> $inputs */
    #[Required(list: PublicAssociation::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociation::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociation)->withInputs(...)
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
     * @param list<PublicAssociationShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicAssociationShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
