<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type marketing_forms_collection_response_form_definition_base_forward_paging = array{
 *   results: list<MarketingFormsHubSpotFormDefinition>, paging?: ForwardPaging
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<marketing_forms_collection_response_form_definition_base_forward_paging>
     */
    use SdkModel;

    /** @var list<MarketingFormsHubSpotFormDefinition> $results */
    #[Api(list: MarketingFormsHubSpotFormDefinition::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging)
     *   ->withResults(...)
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
     * @param list<MarketingFormsHubSpotFormDefinition> $results
     */
    public static function with(
        array $results,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<MarketingFormsHubSpotFormDefinition> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
