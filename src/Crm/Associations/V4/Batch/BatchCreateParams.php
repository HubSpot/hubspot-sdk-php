<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4\Batch;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\PublicObjectID;

/**
 * Batch create associations for objects.
 *
 * @see HubspotSDK\Services\Crm\Associations\V4\BatchService::create()
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationMultiPost|array{
 *     from: PublicObjectID, to: PublicObjectID, types: list<AssociationSpec>
 *   }>,
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationMultiPost> $inputs */
    #[Required(list: PublicAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationMultiPost|array{
     *   from: PublicObjectID, to: PublicObjectID, types: list<AssociationSpec>
     * }> $inputs
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
     * @param list<PublicAssociationMultiPost|array{
     *   from: PublicObjectID, to: PublicObjectID, types: list<AssociationSpec>
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
