<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponsePublicActionDefinitionForwardPagingShape = array{
 *   results: list<PublicActionDefinition>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicActionDefinitionForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicActionDefinitionForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicActionDefinition> $results */
    #[Api(list: PublicActionDefinition::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicActionDefinitionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicActionDefinitionForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicActionDefinitionForwardPaging)->withResults(...)
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
     * @param list<PublicActionDefinition|array{
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
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<PublicActionDefinition|array{
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
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
