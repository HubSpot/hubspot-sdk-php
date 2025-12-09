<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiArchive;
use HubspotSDK\PublicObjectID;

/**
 * Batch delete associations for objects.
 *
 * @see HubspotSDK\Services\Crm\Associations\V4\BatchService::delete()
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationMultiArchive|array{
 *     from: PublicObjectID, to: list<PublicObjectID>
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
     * @param list<PublicAssociationMultiArchive|array{
     *   from: PublicObjectID, to: list<PublicObjectID>
     * }> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $obj = new self;

        $obj['fromObjectType'] = $fromObjectType;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj['fromObjectType'] = $fromObjectType;

        return $obj;
    }

    /**
     * @param list<PublicAssociationMultiArchive|array{
     *   from: PublicObjectID, to: list<PublicObjectID>
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
