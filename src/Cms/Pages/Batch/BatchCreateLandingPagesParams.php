<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\Batch;

use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a batch of landing pages as detailed in the request body.
 *
 * @see HubSpotSDK\Services\Cms\Pages\BatchService::createLandingPages()
 *
 * @phpstan-type BatchCreateLandingPagesParamsShape = array{inputs: list<mixed>}
 */
final class BatchCreateLandingPagesParams implements BaseModel
{
    /** @use SdkModel<BatchCreateLandingPagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pages to input.
     *
     * @var list<mixed> $inputs
     */
    #[Required(list: PagesPage::class)]
    public array $inputs;

    /**
     * `new BatchCreateLandingPagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateLandingPagesParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateLandingPagesParams)->withInputs(...)
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
     * @param list<mixed> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Pages to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
