<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\PublicAssociation;
use HubspotSDK\PublicObjectID;

/**
 * This endpoint allows you to archive multiple associations between specified 'from' and 'to' object types in a single batch request.
 *
 * @see HubspotSDK\Services\Crm\Associations\BatchService::delete()
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociation|array{
 *     from: PublicObjectID, to: PublicObjectID, type: string
 *   }>,
 * }
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociation> $inputs */
    #[Required(list: PublicAssociation::class)]
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
     * @param list<PublicAssociation|array{
     *   from: PublicObjectID, to: PublicObjectID, type: string
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
     * @param list<PublicAssociation|array{
     *   from: PublicObjectID, to: PublicObjectID, type: string
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
