<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\PublicDefaultAssociationMultiPost;

/**
 * Create the default (most generic) association type between two object types.
 *
 * @see HubspotSDK\CRM\Associations\V4\Batch->batchAssociateDefault
 *
 * @phpstan-type batch_batch_associate_default_params = array{
 *   fromObjectType: string, inputs: list<PublicDefaultAssociationMultiPost>
 * }
 */
final class BatchBatchAssociateDefaultParams implements BaseModel
{
    /** @use SdkModel<batch_batch_associate_default_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicDefaultAssociationMultiPost> $inputs */
    #[Api(list: PublicDefaultAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchBatchAssociateDefaultParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchBatchAssociateDefaultParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchBatchAssociateDefaultParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicDefaultAssociationMultiPost> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    /**
     * @param list<PublicDefaultAssociationMultiPost> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
