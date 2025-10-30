<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicDealSplitsBatchCreateRequestShape = array{
 *   inputs: list<PublicDealSplitsCreateRequest>
 * }
 */
final class PublicDealSplitsBatchCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicDealSplitsBatchCreateRequestShape> */
    use SdkModel;

    /** @var list<PublicDealSplitsCreateRequest> $inputs */
    #[Api(list: PublicDealSplitsCreateRequest::class)]
    public array $inputs;

    /**
     * `new PublicDealSplitsBatchCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDealSplitsBatchCreateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDealSplitsBatchCreateRequest)->withInputs(...)
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
     * @param list<PublicDealSplitsCreateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicDealSplitsCreateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
