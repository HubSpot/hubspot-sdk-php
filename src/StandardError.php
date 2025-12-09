<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * Ye olde error.
 *
 * @phpstan-type StandardErrorShape = array{
 *   category: string,
 *   context: array<string,list<string>>,
 *   errors: list<ErrorDetail>,
 *   links: array<string,string>,
 *   message: string,
 *   status: string,
 *   id?: string|null,
 *   subCategory?: mixed,
 * }
 */
final class StandardError implements BaseModel
{
    /** @use SdkModel<StandardErrorShape> */
    use SdkModel;

    /**
     * The main category of the error.
     */
    #[Required]
    public string $category;

    /**
     * Additional context-specific information related to the error.
     *
     * @var array<string,list<string>> $context
     */
    #[Required(map: new ListOf('string'))]
    public array $context;

    /**
     * The detailed error objects.
     *
     * @var list<ErrorDetail> $errors
     */
    #[Required(list: ErrorDetail::class)]
    public array $errors;

    /**
     * URLs linking to documentation or resources associated with the error.
     *
     * @var array<string,string> $links
     */
    #[Required(map: 'string')]
    public array $links;

    /**
     * A human-readable string describing the error and possible remediation steps.
     */
    #[Required]
    public string $message;

    /**
     * The HTTP status code associated with the error.
     */
    #[Required]
    public string $status;

    /**
     * A unique ID for the error instance.
     */
    #[Optional]
    public ?string $id;

    /**
     * A more specific error category within each main category.
     */
    #[Optional]
    public mixed $subCategory;

    /**
     * `new StandardError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StandardError::with(
     *   category: ...,
     *   context: ...,
     *   errors: ...,
     *   links: ...,
     *   message: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StandardError)
     *   ->withCategory(...)
     *   ->withContext(...)
     *   ->withErrors(...)
     *   ->withLinks(...)
     *   ->withMessage(...)
     *   ->withStatus(...)
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
     * @param array<string,list<string>> $context
     * @param list<ErrorDetail|array{
     *   message: string,
     *   code?: string|null,
     *   context?: array<string,list<string>>|null,
     *   in?: string|null,
     *   subCategory?: string|null,
     * }> $errors
     * @param array<string,string> $links
     */
    public static function with(
        string $category,
        array $context,
        array $errors,
        array $links,
        string $message,
        string $status,
        ?string $id = null,
        mixed $subCategory = null,
    ): self {
        $self = new self;

        $self['category'] = $category;
        $self['context'] = $context;
        $self['errors'] = $errors;
        $self['links'] = $links;
        $self['message'] = $message;
        $self['status'] = $status;

        null !== $id && $self['id'] = $id;
        null !== $subCategory && $self['subCategory'] = $subCategory;

        return $self;
    }

    /**
     * The main category of the error.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * Additional context-specific information related to the error.
     *
     * @param array<string,list<string>> $context
     */
    public function withContext(array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * The detailed error objects.
     *
     * @param list<ErrorDetail|array{
     *   message: string,
     *   code?: string|null,
     *   context?: array<string,list<string>>|null,
     *   in?: string|null,
     *   subCategory?: string|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * URLs linking to documentation or resources associated with the error.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * A human-readable string describing the error and possible remediation steps.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The HTTP status code associated with the error.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * A unique ID for the error instance.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A more specific error category within each main category.
     */
    public function withSubCategory(mixed $subCategory): self
    {
        $self = clone $this;
        $self['subCategory'] = $subCategory;

        return $self;
    }
}
