<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Input data for merging two records.
 *
 * @phpstan-type PublicMergeInputShape = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class PublicMergeInput implements BaseModel
{
    /** @use SdkModel<PublicMergeInputShape> */
    use SdkModel;

    /**
     * The object ID of the record that the merge will not set as the current value after the merge.
     */
    #[Required('objectIdToMerge')]
    public string $objectIDToMerge;

    /**
     * The object ID of the record that the merge will generally set as the current value after the merge.
     */
    #[Required('primaryObjectId')]
    public string $primaryObjectID;

    /**
     * `new PublicMergeInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMergeInput::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMergeInput)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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
    public static function with(
        string $objectIDToMerge,
        string $primaryObjectID
    ): self {
        $self = new self;

        $self['objectIDToMerge'] = $objectIDToMerge;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }

    /**
     * The object ID of the record that the merge will not set as the current value after the merge.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $self = clone $this;
        $self['objectIDToMerge'] = $objectIDToMerge;

        return $self;
    }

    /**
     * The object ID of the record that the merge will generally set as the current value after the merge.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $self = clone $this;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }
}
