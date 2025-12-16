<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationSpecShape from \HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationSpec
 *
 * @phpstan-type BatchInputPublicAssociationSpecShape = array{
 *   inputs: list<PublicAssociationSpecShape>
 * }
 */
final class BatchInputPublicAssociationSpec implements BaseModel
{
    /** @use SdkModel<BatchInputPublicAssociationSpecShape> */
    use SdkModel;

    /** @var list<PublicAssociationSpec> $inputs */
    #[Required(list: PublicAssociationSpec::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociationSpec()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociationSpec::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociationSpec)->withInputs(...)
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
     * @param list<PublicAssociationSpecShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicAssociationSpecShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
