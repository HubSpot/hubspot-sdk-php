<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\PublicAssociationMultiPost;

/**
 * Batch remove specific labelled associations between records in bulk. Deleting an unlabeled association will also delete all labeled associations between those two objects.
 *
 * @see HubspotSDK\Services\Crm\Associations\BatchService::deleteLabels()
 *
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubspotSDK\Crm\Associations\PublicAssociationMultiPost
 *
 * @phpstan-type BatchDeleteLabelsParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationMultiPost|PublicAssociationMultiPostShape>,
 * }
 */
final class BatchDeleteLabelsParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteLabelsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationMultiPost> $inputs */
    #[Required(list: PublicAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchDeleteLabelsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteLabelsParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteLabelsParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationMultiPost|PublicAssociationMultiPostShape> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    /**
     * @param list<PublicAssociationMultiPost|PublicAssociationMultiPostShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
