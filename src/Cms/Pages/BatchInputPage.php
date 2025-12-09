<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Wrapper for providing an array of pages as inputs.
 *
 * @phpstan-type BatchInputPageShape = array{inputs: list<mixed>}
 */
final class BatchInputPage implements BaseModel
{
    /** @use SdkModel<BatchInputPageShape> */
    use SdkModel;

    /**
     * Pages to input.
     *
     * @var list<mixed> $inputs
     */
    #[Required(list: Page::class)]
    public array $inputs;

    /**
     * `new BatchInputPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPage::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPage)->withInputs(...)
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
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * Pages to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
