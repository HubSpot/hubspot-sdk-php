<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Associations\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\PublicAssociationMultiArchive;

/**
 * Batch delete associations for objects.
 *
 * @see HubSpotSDK\Services\Crm\Associations\BatchService::delete()
 *
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubSpotSDK\Crm\PublicAssociationMultiArchive
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationMultiArchive|PublicAssociationMultiArchiveShape>,
 * }
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationMultiArchive> $inputs */
    #[Required(list: PublicAssociationMultiArchive::class)]
    public array $inputs;

    /**
     * `new BatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationMultiArchive|PublicAssociationMultiArchiveShape> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    /**
     * @param list<PublicAssociationMultiArchive|PublicAssociationMultiArchiveShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
