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
 *   revisionId: string,
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

    #[Required]
    public string $revisionId;

    /**
     * `new PublicActionRevision()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionRevision::with(
     *   id: ..., createdAt: ..., definition: ..., revisionId: ...
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
     *   actionUrl: string,
     *   functions: list<PublicActionFunctionIdentifier>,
     *   inputFields: list<InputFieldDefinition>,
     *   labels: array<string,PublicActionLabels>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   revisionId: string,
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
        string $revisionId,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['definition'] = $definition;
        $obj['revisionId'] = $revisionId;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param PublicActionDefinition|array{
     *   id: string,
     *   actionUrl: string,
     *   functions: list<PublicActionFunctionIdentifier>,
     *   inputFields: list<InputFieldDefinition>,
     *   labels: array<string,PublicActionLabels>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   revisionId: string,
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
        $obj = clone $this;
        $obj['definition'] = $definition;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj['revisionId'] = $revisionID;

        return $obj;
    }
}
