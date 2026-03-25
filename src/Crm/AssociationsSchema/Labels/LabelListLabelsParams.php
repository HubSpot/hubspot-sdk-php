<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\Labels;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all labels that describe the relationships between two specified CRM object types. These labels provide context about the nature of the associations.
 *
 * @see HubspotSDK\Services\Crm\AssociationsSchema\LabelsService::listLabels()
 *
 * @phpstan-type LabelListLabelsParamsShape = array{fromObjectType: string}
 */
final class LabelListLabelsParams implements BaseModel
{
    /** @use SdkModel<LabelListLabelsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /**
     * `new LabelListLabelsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelListLabelsParams::with(fromObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelListLabelsParams)->withFromObjectType(...)
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
    public static function with(string $fromObjectType): self
    {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }
}
