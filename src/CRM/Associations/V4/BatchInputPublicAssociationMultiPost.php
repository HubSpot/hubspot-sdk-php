<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicAssociationMultiPostShape = array{
 *   inputs: list<PublicAssociationMultiPost>
 * }
 */
final class BatchInputPublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<BatchInputPublicAssociationMultiPostShape> */
    use SdkModel;

    /** @var list<PublicAssociationMultiPost> $inputs */
    #[Api(list: PublicAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociationMultiPost::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociationMultiPost)->withInputs(...)
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
     * @param list<PublicAssociationMultiPost> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicAssociationMultiPost> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
