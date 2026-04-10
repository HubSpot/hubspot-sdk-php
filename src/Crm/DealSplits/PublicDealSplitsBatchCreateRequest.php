<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\DealSplits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 *
 * @phpstan-type PublicDealSplitsBatchCreateRequestShape = array{
 *   inputs: list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape>
 * }
 */
final class PublicDealSplitsBatchCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicDealSplitsBatchCreateRequestShape> */
    use SdkModel;

    /**
     * An array of deal split inputs.
     *
     * @var list<PublicDealSplitsCreateRequest> $inputs
     */
    #[Required(list: PublicDealSplitsCreateRequest::class)]
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
     * @param list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of deal split inputs.
     *
     * @param list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
