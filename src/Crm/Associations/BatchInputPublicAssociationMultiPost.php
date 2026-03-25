<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubspotSDK\Crm\Associations\PublicAssociationMultiPost
 *
 * @phpstan-type BatchInputPublicAssociationMultiPostShape = array{
 *   inputs: list<PublicAssociationMultiPost|PublicAssociationMultiPostShape>
 * }
 */
final class BatchInputPublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<BatchInputPublicAssociationMultiPostShape> */
    use SdkModel;

    /** @var list<PublicAssociationMultiPost> $inputs */
    #[Required(list: PublicAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociationMultiPost::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociationMultiPost)->withInputs(...)
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
     * @param list<PublicAssociationMultiPost|PublicAssociationMultiPostShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicAssociationMultiPost|PublicAssociationMultiPostShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
