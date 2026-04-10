<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\ObjectSchemas\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details of multiple custom object schemas by providing a batch request with specified inputs. This operation allows you to fetch schema information, including properties and associations, for multiple custom objects in a single API call.
 *
 * @see HubSpotSDK\Services\Crm\ObjectSchemas\BatchService::get()
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   includeAssociationDefinitions: bool,
 *   includeAuditMetadata: bool,
 *   includePropertyDefinitions: bool,
 *   inputs: list<string>,
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Indicates whether to include association definitions in the response.
     */
    #[Required]
    public bool $includeAssociationDefinitions;

    /**
     * Indicates whether to include audit metadata in the response.
     */
    #[Required]
    public bool $includeAuditMetadata;

    /**
     * Indicates whether to include property definitions in the response.
     */
    #[Required]
    public bool $includePropertyDefinitions;

    /** @var list<string> $inputs */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(
     *   includeAssociationDefinitions: ...,
     *   includeAuditMetadata: ...,
     *   includePropertyDefinitions: ...,
     *   inputs: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)
     *   ->withIncludeAssociationDefinitions(...)
     *   ->withIncludeAuditMetadata(...)
     *   ->withIncludePropertyDefinitions(...)
     *   ->withInputs(...)
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
    public static function with(
        bool $includeAssociationDefinitions,
        bool $includeAuditMetadata,
        bool $includePropertyDefinitions,
        array $inputs,
    ): self {
        $self = new self;

        $self['includeAssociationDefinitions'] = $includeAssociationDefinitions;
        $self['includeAuditMetadata'] = $includeAuditMetadata;
        $self['includePropertyDefinitions'] = $includePropertyDefinitions;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Indicates whether to include association definitions in the response.
     */
    public function withIncludeAssociationDefinitions(
        bool $includeAssociationDefinitions
    ): self {
        $self = clone $this;
        $self['includeAssociationDefinitions'] = $includeAssociationDefinitions;

        return $self;
    }

    /**
     * Indicates whether to include audit metadata in the response.
     */
    public function withIncludeAuditMetadata(bool $includeAuditMetadata): self
    {
        $self = clone $this;
        $self['includeAuditMetadata'] = $includeAuditMetadata;

        return $self;
    }

    /**
     * Indicates whether to include property definitions in the response.
     */
    public function withIncludePropertyDefinitions(
        bool $includePropertyDefinitions
    ): self {
        $self = clone $this;
        $self['includePropertyDefinitions'] = $includePropertyDefinitions;

        return $self;
    }

    /**
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
