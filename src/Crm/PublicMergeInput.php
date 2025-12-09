<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMergeInputShape = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class PublicMergeInput implements BaseModel
{
    /** @use SdkModel<PublicMergeInputShape> */
    use SdkModel;

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    #[Required('objectIdToMerge')]
    public string $objectIDToMerge;

    /**
     * The unique identifier of the CRM object that will remain after the merge.
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
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $self = clone $this;
        $self['objectIDToMerge'] = $objectIDToMerge;

        return $self;
    }

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $self = clone $this;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }
}
