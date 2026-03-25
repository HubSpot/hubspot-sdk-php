<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\Labels;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Remove a specific label from the association between two CRM object types.
 *
 * @see HubspotSDK\Services\Crm\AssociationsSchema\LabelsService::deleteLabel()
 *
 * @phpstan-type LabelDeleteLabelParamsShape = array{
 *   fromObjectType: string, toObjectType: string
 * }
 */
final class LabelDeleteLabelParams implements BaseModel
{
    /** @use SdkModel<LabelDeleteLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    #[Required]
    public string $toObjectType;

    /**
     * `new LabelDeleteLabelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelDeleteLabelParams::with(fromObjectType: ..., toObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelDeleteLabelParams)->withFromObjectType(...)->withToObjectType(...)
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
        string $fromObjectType,
        string $toObjectType
    ): self {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }
}
