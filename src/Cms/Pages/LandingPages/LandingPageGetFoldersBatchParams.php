<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the Folder objects identified in the request body.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::getFoldersBatch()
 *
 * @phpstan-type LandingPageGetFoldersBatchParamsShape = array{
 *   inputs: list<string>, archived?: bool
 * }
 */
final class LandingPageGetFoldersBatchParams implements BaseModel
{
    /** @use SdkModel<LandingPageGetFoldersBatchParamsShape> */
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
     * Specifies whether to return deleted Folders. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new LandingPageGetFoldersBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageGetFoldersBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageGetFoldersBatchParams)->withInputs(...)
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
    public static function with(array $inputs, ?bool $archived = null): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        null !== $archived && $self['archived'] = $archived;

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

    /**
     * Specifies whether to return deleted Folders. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
