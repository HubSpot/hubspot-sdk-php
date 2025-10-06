<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new V4ArchiveLabelsParams); // set properties as needed
 * $client->crm.associations.v4->archiveLabels(...$params->toArray());
 * ```
 * Delete Specific Labels.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations.v4->archiveLabels(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations\V4->archiveLabels
 *
 * @phpstan-type v4_archive_labels_params = array{
 *   fromObjectType: string, inputs: list<PublicAssociationMultiPost>
 * }
 */
final class V4ArchiveLabelsParams implements BaseModel
{
    /** @use SdkModel<v4_archive_labels_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociationMultiPost> $inputs */
    #[Api(list: PublicAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new V4ArchiveLabelsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4ArchiveLabelsParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4ArchiveLabelsParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationMultiPost> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    /**
     * @param list<PublicAssociationMultiPost> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
