<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the Folder objects identified in the request body.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::updateFoldersBatch()
 *
 * @phpstan-type LandingPageUpdateFoldersBatchParamsShape = array{
 *   inputs: list<mixed>, archived?: bool
 * }
 */
final class LandingPageUpdateFoldersBatchParams implements BaseModel
{
    /** @use SdkModel<LandingPageUpdateFoldersBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * JSON nodes to input.
     *
     * @var list<mixed> $inputs
     */
    #[Api(list: 'mixed')]
    public array $inputs;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new LandingPageUpdateFoldersBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageUpdateFoldersBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageUpdateFoldersBatchParams)->withInputs(...)
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
    public static function with(array $inputs, ?bool $archived = null): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        null !== $archived && $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * JSON nodes to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }
}
