<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create the Folder objects detailed in the request body.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::createFoldersBatch()
 *
 * @phpstan-type LandingPageCreateFoldersBatchParamsShape = array{
 *   inputs: list<ContentFolder|array{
 *     id: string,
 *     category: int,
 *     created: \DateTimeInterface,
 *     deletedAt: \DateTimeInterface,
 *     name: string,
 *     parentFolderID: int,
 *     updated: \DateTimeInterface,
 *   }>,
 * }
 */
final class LandingPageCreateFoldersBatchParams implements BaseModel
{
    /** @use SdkModel<LandingPageCreateFoldersBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Content folders to input.
     *
     * @var list<ContentFolder> $inputs
     */
    #[Required(list: ContentFolder::class)]
    public array $inputs;

    /**
     * `new LandingPageCreateFoldersBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageCreateFoldersBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageCreateFoldersBatchParams)->withInputs(...)
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
     * @param list<ContentFolder|array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: \DateTimeInterface,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Content folders to input.
     *
     * @param list<ContentFolder|array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: \DateTimeInterface,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
