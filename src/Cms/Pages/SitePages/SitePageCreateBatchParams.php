<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create the Site Page objects detailed in the request body.
 *
 * @see HubspotSDK\Cms\Pages\SitePages->createBatch
 *
 * @phpstan-type SitePageCreateBatchParamsShape = array{inputs: list<Page>}
 */
final class SitePageCreateBatchParams implements BaseModel
{
    /** @use SdkModel<SitePageCreateBatchParamsShape> */
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
     * `new SitePageCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageCreateBatchParams)->withInputs(...)
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
