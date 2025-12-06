<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;

/**
 * Returns a list of forms based on the search filters. By default, it returns the first 20 `hubspot` forms.
 *
 * @see HubspotSDK\Services\Marketing\FormsService::list()
 *
 * @phpstan-type FormListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   formTypes?: list<FormType|value-of<FormType>>,
 *   limit?: int,
 * }
 */
final class FormListParams implements BaseModel
{
    /** @use SdkModel<FormListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The form types to be included in the results.
     *
     * @var list<value-of<FormType>>|null $formTypes
     */
    #[Api(list: FormType::class, optional: true)]
    public ?array $formTypes;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<FormType|value-of<FormType>> $formTypes
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $formTypes = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $formTypes && $obj['formTypes'] = $formTypes;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * The form types to be included in the results.
     *
     * @param list<FormType|value-of<FormType>> $formTypes
     */
    public function withFormTypes(array $formTypes): self
    {
        $obj = clone $this;
        $obj['formTypes'] = $formTypes;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
