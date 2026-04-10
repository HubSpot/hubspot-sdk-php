<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Associations;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubSpotSDK\Crm\Associations\PublicDefaultAssociationMultiPost
 *
 * @phpstan-type BatchInputPublicDefaultAssociationMultiPostShape = array{
 *   inputs: list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape>,
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
     * @param list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
