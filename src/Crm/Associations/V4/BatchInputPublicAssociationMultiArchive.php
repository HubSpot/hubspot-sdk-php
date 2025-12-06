<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type BatchInputPublicAssociationMultiArchiveShape = array{
 *   inputs: list<PublicAssociationMultiArchive>
 * }
 */
final class BatchInputPublicAssociationMultiArchive implements BaseModel
{
    /** @use SdkModel<BatchInputPublicAssociationMultiArchiveShape> */
    use SdkModel;

    /** @var list<PublicAssociationMultiArchive> $inputs */
    #[Api(list: PublicAssociationMultiArchive::class)]
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
     * @param list<PublicAssociationMultiArchive|array{
     *   from: PublicObjectID, to: list<PublicObjectID>
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

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
