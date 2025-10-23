<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete the Folder objects identified in the request body.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->deleteFoldersBatch
 *
 * @phpstan-type landing_page_delete_folders_batch_params = array{
 *   inputs: list<string>
 * }
 */
final class LandingPageDeleteFoldersBatchParams implements BaseModel
{
    /** @use SdkModel<landing_page_delete_folders_batch_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Api(list: 'string')]
    public array $inputs;

    /**
     * `new LandingPageDeleteFoldersBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageDeleteFoldersBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageDeleteFoldersBatchParams)->withInputs(...)
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
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
