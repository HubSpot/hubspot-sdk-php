<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set association labels between two records.
 *
 * @see HubspotSDK\CRM\Associations\V4->updateAssociationLabels
 *
 * @phpstan-type v4_update_association_labels_params = array{
 *   objectType: string,
 *   objectID: string,
 *   toObjectType: string,
 *   body: list<AssociationSpec1>,
 * }
 */
final class V4UpdateAssociationLabelsParams implements BaseModel
{
    /** @use SdkModel<v4_update_association_labels_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $objectID;

    #[Api]
    public string $toObjectType;

    /** @var list<AssociationSpec1> $body */
    #[Api(list: AssociationSpec1::class)]
    public array $body;

    /**
     * `new V4UpdateAssociationLabelsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4UpdateAssociationLabelsParams::with(
     *   objectType: ..., objectID: ..., toObjectType: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4UpdateAssociationLabelsParams)
     *   ->withObjectType(...)
     *   ->withObjectID(...)
     *   ->withToObjectType(...)
     *   ->withBody(...)
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
     * @param list<AssociationSpec1> $body
     */
    public static function with(
        string $objectType,
        string $objectID,
        string $toObjectType,
        array $body
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->objectID = $objectID;
        $obj->toObjectType = $toObjectType;
        $obj->body = $body;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    /**
     * @param list<AssociationSpec1> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
