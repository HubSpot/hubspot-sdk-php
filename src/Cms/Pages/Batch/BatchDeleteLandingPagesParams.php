<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete landing pages specified by ID in the request body. Note: this is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
 *
 * @see HubSpotSDK\Services\Cms\Pages\BatchService::deleteLandingPages()
 *
 * @phpstan-type BatchDeleteLandingPagesParamsShape = array{inputs: list<string>}
 */
final class BatchDeleteLandingPagesParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteLandingPagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * `new BatchDeleteLandingPagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteLandingPagesParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteLandingPagesParams)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
