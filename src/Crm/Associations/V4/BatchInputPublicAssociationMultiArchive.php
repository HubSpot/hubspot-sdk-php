<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubspotSDK\Crm\Associations\V4\PublicAssociationMultiArchive
 *
 * @phpstan-type BatchInputPublicAssociationMultiArchiveShape = array{
 *   inputs: list<PublicAssociationMultiArchiveShape>
 * }
 */
final class BatchInputPublicAssociationMultiArchive implements BaseModel
{
    /** @use SdkModel<BatchInputPublicAssociationMultiArchiveShape> */
    use SdkModel;

    /** @var list<PublicAssociationMultiArchive> $inputs */
    #[Required(list: PublicAssociationMultiArchive::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociationMultiArchive()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociationMultiArchive::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociationMultiArchive)->withInputs(...)
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
     * @param list<PublicAssociationMultiArchiveShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicAssociationMultiArchiveShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
