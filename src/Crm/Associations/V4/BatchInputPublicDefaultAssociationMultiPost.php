<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicDefaultAssociationMultiPostShape = array{
 *   inputs: list<PublicDefaultAssociationMultiPost>
 * }
 */
final class BatchInputPublicDefaultAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<BatchInputPublicDefaultAssociationMultiPostShape> */
    use SdkModel;

    /** @var list<PublicDefaultAssociationMultiPost> $inputs */
    #[Api(list: PublicDefaultAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicDefaultAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicDefaultAssociationMultiPost::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicDefaultAssociationMultiPost)->withInputs(...)
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
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

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
