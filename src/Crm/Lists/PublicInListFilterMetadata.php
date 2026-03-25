<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicInListFilterMetadataShape = array{
 *   id: string, inListType: string
 * }
 */
final class PublicInListFilterMetadata implements BaseModel
{
    /** @use SdkModel<PublicInListFilterMetadataShape> */
    use SdkModel;

    /**
     * The identifier for the filter metadata.
     */
    #[Required]
    public string $id;

    /**
     * Specifies the type of list for the filter (WORKFLOWS_ENROLLMENT, WORKFLOWS_ACTIVE, WORKFLOWS_GOAL, WORKFLOWS_COMPLETED, IMPORT, DATASET, DATASETS).
     */
    #[Required]
    public string $inListType;

    /**
     * `new PublicInListFilterMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInListFilterMetadata::with(id: ..., inListType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicInListFilterMetadata)->withID(...)->withInListType(...)
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
     */
    public static function with(string $id, string $inListType): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['inListType'] = $inListType;

        return $self;
    }

    /**
     * The identifier for the filter metadata.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies the type of list for the filter (WORKFLOWS_ENROLLMENT, WORKFLOWS_ACTIVE, WORKFLOWS_GOAL, WORKFLOWS_COMPLETED, IMPORT, DATASET, DATASETS).
     */
    public function withInListType(string $inListType): self
    {
        $self = clone $this;
        $self['inListType'] = $inListType;

        return $self;
    }
}
