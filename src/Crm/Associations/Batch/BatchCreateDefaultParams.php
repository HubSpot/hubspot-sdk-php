<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Associations\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\PublicDefaultAssociationMultiPost;

/**
 * Create the default (most generic) association type between two object types.
 *
 * @see HubSpotSDK\Services\Crm\Associations\BatchService::createDefault()
 *
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubSpotSDK\Crm\PublicDefaultAssociationMultiPost
 *
 * @phpstan-type BatchCreateDefaultParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape>,
 * }
 */
final class BatchCreateDefaultParams implements BaseModel
{
    /** @use SdkModel<BatchCreateDefaultParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicDefaultAssociationMultiPost> $inputs */
    #[Required(list: PublicDefaultAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchCreateDefaultParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateDefaultParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateDefaultParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
