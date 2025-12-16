<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubspotSDK\Crm\Associations\V4\PublicDefaultAssociationMultiPost
 *
 * @phpstan-type BatchInputPublicDefaultAssociationMultiPostShape = array{
 *   inputs: list<PublicDefaultAssociationMultiPostShape>
 * }
 */
final class BatchInputPublicDefaultAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<BatchInputPublicDefaultAssociationMultiPostShape> */
    use SdkModel;

    /** @var list<PublicDefaultAssociationMultiPost> $inputs */
    #[Required(list: PublicDefaultAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicDefaultAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicDefaultAssociationMultiPost::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicDefaultAssociationMultiPost)->withInputs(...)
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
     * @param list<PublicDefaultAssociationMultiPostShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicDefaultAssociationMultiPostShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
