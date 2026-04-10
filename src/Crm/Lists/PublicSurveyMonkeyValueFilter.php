<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter\FilterType;

/**
 * @phpstan-import-type ValueComparisonVariants from \HubSpotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter\ValueComparison
 * @phpstan-import-type ValueComparisonShape from \HubSpotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter\ValueComparison
 *
 * @phpstan-type PublicSurveyMonkeyValueFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   surveyID: string,
 *   surveyQuestion: string,
 *   valueComparison: ValueComparisonShape,
 *   surveyAnswerColID?: string|null,
 *   surveyAnswerRowID?: string|null,
 * }
 */
final class PublicSurveyMonkeyValueFilter implements BaseModel
{
    /** @use SdkModel<PublicSurveyMonkeyValueFilterShape> */
    use SdkModel;

    /**
     * Defines the type of filter (SURVEY_MONKEY_VALUE).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Defines the operation to be applied within the filter (HAS_ANSWERED_SURVEY_QUESTION_WITH_VALUE).
     */
    #[Required]
    public string $operator;

    /**
     * The ID of the survey used in the filter.
     */
    #[Required('surveyId')]
    public string $surveyID;

    /**
     * The question from the survey used in the filter.
     */
    #[Required]
    public string $surveyQuestion;

    /**
     * Specifies the operation used to compare the survey answer value.
     *
     * @var ValueComparisonVariants $valueComparison
     */
    #[Required]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison;

    /**
     * The column ID of the survey answer used in the filter.
     */
    #[Optional('surveyAnswerColId')]
    public ?string $surveyAnswerColID;

    /**
     * The row ID of the survey answer used in the filter.
     */
    #[Optional('surveyAnswerRowId')]
    public ?string $surveyAnswerRowID;

    /**
     * `new PublicSurveyMonkeyValueFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSurveyMonkeyValueFilter::with(
     *   filterType: ...,
     *   operator: ...,
     *   surveyID: ...,
     *   surveyQuestion: ...,
     *   valueComparison: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSurveyMonkeyValueFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSurveyID(...)
     *   ->withSurveyQuestion(...)
     *   ->withValueComparison(...)
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
     * @param ValueComparisonShape $valueComparison
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $operator,
        string $surveyID,
        string $surveyQuestion,
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
        FilterType|string $filterType = 'SURVEY_MONKEY_VALUE',
        ?string $surveyAnswerColID = null,
        ?string $surveyAnswerRowID = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['surveyID'] = $surveyID;
        $self['surveyQuestion'] = $surveyQuestion;
        $self['valueComparison'] = $valueComparison;

        null !== $surveyAnswerColID && $self['surveyAnswerColID'] = $surveyAnswerColID;
        null !== $surveyAnswerRowID && $self['surveyAnswerRowID'] = $surveyAnswerRowID;

        return $self;
    }

    /**
     * Defines the type of filter (SURVEY_MONKEY_VALUE).
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
     * Defines the operation to be applied within the filter (HAS_ANSWERED_SURVEY_QUESTION_WITH_VALUE).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The ID of the survey used in the filter.
     */
    public function withSurveyID(string $surveyID): self
    {
        $self = clone $this;
        $self['surveyID'] = $surveyID;

        return $self;
    }

    /**
     * The question from the survey used in the filter.
     */
    public function withSurveyQuestion(string $surveyQuestion): self
    {
        $self = clone $this;
        $self['surveyQuestion'] = $surveyQuestion;

        return $self;
    }

    /**
     * Specifies the operation used to compare the survey answer value.
     *
     * @param ValueComparisonShape $valueComparison
     */
    public function withValueComparison(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
    ): self {
        $self = clone $this;
        $self['valueComparison'] = $valueComparison;

        return $self;
    }

    /**
     * The column ID of the survey answer used in the filter.
     */
    public function withSurveyAnswerColID(string $surveyAnswerColID): self
    {
        $self = clone $this;
        $self['surveyAnswerColID'] = $surveyAnswerColID;

        return $self;
    }

    /**
     * The row ID of the survey answer used in the filter.
     */
    public function withSurveyAnswerRowID(string $surveyAnswerRowID): self
    {
        $self = clone $this;
        $self['surveyAnswerRowID'] = $surveyAnswerRowID;

        return $self;
    }
}
