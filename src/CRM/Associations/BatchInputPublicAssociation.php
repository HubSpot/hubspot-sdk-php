<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_public_association = array{
 *   inputs: list<PublicAssociation>
 * }
 */
final class BatchInputPublicAssociation implements BaseModel
{
    /** @use SdkModel<batch_input_public_association> */
    use SdkModel;

    /** @var list<PublicAssociation> $inputs */
    #[Api(list: PublicAssociation::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociation::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociation)->withInputs(...)
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
     * @param list<PublicAssociation> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicAssociation> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
