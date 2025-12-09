<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionRevisionShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   definition: PublicActionDefinition,
 *   revisionID: string,
 * }
 */
final class PublicActionRevision implements BaseModel
{
    /** @use SdkModel<PublicActionRevisionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public PublicActionDefinition $definition;

    #[Required('revisionId')]
    public string $revisionID;

    /**
     * `new PublicActionRevision()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionRevision::with(
     *   id: ..., createdAt: ..., definition: ..., revisionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionRevision)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDefinition(...)
     *   ->withRevisionID(...)
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
     * @param PublicActionDefinition|array{
     *   id: string,
     *   actionURL: string,
     *   functions: list<PublicActionFunctionIdentifier>,
     *   inputFields: list<InputFieldDefinition>,
     *   labels: array<string,PublicActionLabels>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   revisionID: string,
     *   archivedAt?: int|null,
     *   executionRules?: list<PublicExecutionTranslationRule>|null,
     *   inputFieldDependencies?: list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null,
     *   objectRequestOptions?: PublicObjectRequestOptions|null,
     *   outputFields?: list<OutputFieldDefinition>|null,
     * } $definition
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        PublicActionDefinition|array $definition,
        string $revisionID,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['definition'] = $definition;
        $self['revisionID'] = $revisionID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param PublicActionDefinition|array{
     *   id: string,
     *   actionURL: string,
     *   functions: list<PublicActionFunctionIdentifier>,
     *   inputFields: list<InputFieldDefinition>,
     *   labels: array<string,PublicActionLabels>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   revisionID: string,
     *   archivedAt?: int|null,
     *   executionRules?: list<PublicExecutionTranslationRule>|null,
     *   inputFieldDependencies?: list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null,
     *   objectRequestOptions?: PublicObjectRequestOptions|null,
     *   outputFields?: list<OutputFieldDefinition>|null,
     * } $definition
     */
    public function withDefinition(
        PublicActionDefinition|array $definition
    ): self {
        $self = clone $this;
        $self['definition'] = $definition;

        return $self;
    }

    public function withRevisionID(string $revisionID): self
    {
        $self = clone $this;
        $self['revisionID'] = $revisionID;

        return $self;
    }
}
