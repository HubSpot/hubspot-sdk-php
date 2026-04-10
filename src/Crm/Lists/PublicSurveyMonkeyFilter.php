<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicSurveyMonkeyFilter\FilterType;

/**
 * @phpstan-type PublicSurveyMonkeyFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   surveyID: string,
 * }
 */
final class PublicSurveyMonkeyFilter implements BaseModel
{
    /** @use SdkModel<PublicSurveyMonkeyFilterShape> */
    use SdkModel;

    /**
     * Indicates the type of filter being applied (SURVEY_MONKEY).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Specifies the operation to be performed by the filter (HAS_RESPONDED_TO_SURVEY, HAS_NOT_RESPONDED_TO_SURVEY).
     */
    #[Required]
    public string $operator;

    /**
     * The ID of the survey associated with the filter.
     */
    #[Required('surveyId')]
    public string $surveyID;

    /**
     * `new PublicSurveyMonkeyFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSurveyMonkeyFilter::with(filterType: ..., operator: ..., surveyID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSurveyMonkeyFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSurveyID(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $operator,
        string $surveyID,
        FilterType|string $filterType = 'SURVEY_MONKEY',
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['surveyID'] = $surveyID;

        return $self;
    }

    /**
     * Indicates the type of filter being applied (SURVEY_MONKEY).
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Specifies the operation to be performed by the filter (HAS_RESPONDED_TO_SURVEY, HAS_NOT_RESPONDED_TO_SURVEY).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The ID of the survey associated with the filter.
     */
    public function withSurveyID(string $surveyID): self
    {
        $self = clone $this;
        $self['surveyID'] = $surveyID;

        return $self;
    }
}
