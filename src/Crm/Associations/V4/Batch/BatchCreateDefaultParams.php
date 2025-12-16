<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\V4\PublicDefaultAssociationMultiPost;

/**
 * Create the default (most generic) association type between two object types.
 *
 * @see HubspotSDK\Services\Crm\Associations\V4\BatchService::createDefault()
 *
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubspotSDK\Crm\Associations\V4\PublicDefaultAssociationMultiPost
 *
 * @phpstan-type BatchCreateDefaultParamsShape = array{
 *   fromObjectType: string, inputs: list<PublicDefaultAssociationMultiPostShape>
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
     * @param list<PublicDefaultAssociationMultiPostShape> $inputs
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
     * @param list<PublicDefaultAssociationMultiPostShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
