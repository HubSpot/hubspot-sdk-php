<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Core\Conversion\ListOf;

/**
 * Ye olde error.
 *
 * @phpstan-import-type ErrorDetailShape from \HubSpotSDK\ErrorDetail
 *
 * @phpstan-type StandardErrorShape = array{
 *   category: string,
 *   context: array<string,list<string>>,
 *   errors: list<ErrorDetail|ErrorDetailShape>,
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
     * Error category.
     */
    #[Required]
    public string $category;

    /**
     * Error context.
     *
     * @var array<string,list<string>> $context
     */
    #[Required(map: new ListOf('string'))]
    public array $context;

    /**
     * List of error details.
     *
     * @var list<ErrorDetail> $errors
     */
    #[Required(list: ErrorDetail::class)]
    public array $errors;

    /**
     * Error links.
     *
     * @var array<string,string> $links
     */
    #[Required(map: 'string')]
    public array $links;

    /**
     * Error message.
     */
    #[Required]
    public string $message;

    /**
     * Error status.
     */
    #[Required]
    public string $status;

    /**
     * Error ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * Error subcategory.
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
     * @param list<ErrorDetail|ErrorDetailShape> $errors
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
     * Error category.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * Error context.
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
     * List of error details.
     *
     * @param list<ErrorDetail|ErrorDetailShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Error links.
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
     * Error message.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Error status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Error ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Error subcategory.
     */
    public function withSubCategory(mixed $subCategory): self
    {
        $self = clone $this;
        $self['subCategory'] = $subCategory;

        return $self;
    }
}
