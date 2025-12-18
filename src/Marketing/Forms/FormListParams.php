<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
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
 *   after?: string|null,
 *   archived?: bool|null,
 *   formTypes?: list<FormType|value-of<FormType>>|null,
 *   limit?: int|null,
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
    #[Optional]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * The form types to be included in the results.
     *
     * @var list<value-of<FormType>>|null $formTypes
     */
    #[Optional(list: FormType::class)]
    public ?array $formTypes;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
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
     * @param list<FormType|value-of<FormType>>|null $formTypes
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $formTypes = null,
        ?int $limit = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $formTypes && $self['formTypes'] = $formTypes;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The form types to be included in the results.
     *
     * @param list<FormType|value-of<FormType>> $formTypes
     */
    public function withFormTypes(array $formTypes): self
    {
        $self = clone $this;
        $self['formTypes'] = $formTypes;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
