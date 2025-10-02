<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FormListParams); // set properties as needed
 * $client->marketing.forms->list(...$params->toArray());
 * ```
 * Get a list of forms.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.forms->list(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Forms->list
 *
 * @phpstan-type form_list_params = array{
 *   after?: string,
 *   archived?: bool,
 *   formTypes?: list<FormType|value-of<FormType>>,
 *   limit?: int,
 * }
 */
final class FormListParams implements BaseModel
{
    /** @use SdkModel<form_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var list<value-of<FormType>>|null $formTypes */
    #[Api(list: FormType::class, optional: true)]
    public ?array $formTypes;

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

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $formTypes && $obj->formTypes = array_map(fn ($v) => $v instanceof FormType ? $v->value : $v, $formTypes);
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param list<FormType|value-of<FormType>> $formTypes
     */
    public function withFormTypes(array $formTypes): self
    {
        $obj = clone $this;
        $obj->formTypes = array_map(fn ($v) => $v instanceof FormType ? $v->value : $v, $formTypes);

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
