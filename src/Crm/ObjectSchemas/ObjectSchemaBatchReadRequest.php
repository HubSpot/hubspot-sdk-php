<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectSchemas;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectSchemaBatchReadRequestShape = array{
 *   includeAssociationDefinitions: bool,
 *   includeAuditMetadata: bool,
 *   includePropertyDefinitions: bool,
 *   inputs: list<string>,
 * }
 */
final class ObjectSchemaBatchReadRequest implements BaseModel
{
    /** @use SdkModel<ObjectSchemaBatchReadRequestShape> */
    use SdkModel;

    #[Required]
    public bool $includeAssociationDefinitions;

    #[Required]
    public bool $includeAuditMetadata;

    #[Required]
    public bool $includePropertyDefinitions;

    /** @var list<string> $inputs */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * `new ObjectSchemaBatchReadRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaBatchReadRequest::with(
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
     * (new ObjectSchemaBatchReadRequest)
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

    public function withIncludeAssociationDefinitions(
        bool $includeAssociationDefinitions
    ): self {
        $self = clone $this;
        $self['includeAssociationDefinitions'] = $includeAssociationDefinitions;

        return $self;
    }

    public function withIncludeAuditMetadata(bool $includeAuditMetadata): self
    {
        $self = clone $this;
        $self['includeAuditMetadata'] = $includeAuditMetadata;

        return $self;
    }

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
