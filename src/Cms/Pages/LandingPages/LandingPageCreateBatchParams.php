<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create the Landing Page objects detailed in the request body.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::createBatch()
 *
 * @phpstan-type LandingPageCreateBatchParamsShape = array{inputs: list<Page>}
 */
final class LandingPageCreateBatchParams implements BaseModel
{
    /** @use SdkModel<LandingPageCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pages to input.
     *
     * @var list<Page> $inputs
     */
    #[Api(list: Page::class)]
    public array $inputs;

    /**
     * `new LandingPageCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageCreateBatchParams)->withInputs(...)
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
     * @param list<Page> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Pages to input.
     *
     * @param list<Page> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
