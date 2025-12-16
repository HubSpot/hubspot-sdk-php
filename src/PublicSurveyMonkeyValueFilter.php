<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicSurveyMonkeyValueFilter\FilterType;

/**
 * @phpstan-import-type ValueComparisonShape from \HubspotSDK\PublicSurveyMonkeyValueFilter\ValueComparison
 *
 * @phpstan-type PublicSurveyMonkeyValueFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   surveyID: string,
 *   surveyQuestion: string,
 *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation|ValueComparisonShape,
 *   surveyAnswerColID?: string|null,
 *   surveyAnswerRowID?: string|null,
 * }
 */
final class PublicSurveyMonkeyValueFilter implements BaseModel
{
    /** @use SdkModel<PublicSurveyMonkeyValueFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public string $operator;

    #[Required('surveyId')]
    public string $surveyID;

    #[Required]
    public string $surveyQuestion;

    #[Required]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison;

    #[Optional('surveyAnswerColId')]
    public ?string $surveyAnswerColID;

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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withSurveyID(string $surveyID): self
    {
        $self = clone $this;
        $self['surveyID'] = $surveyID;

        return $self;
    }

    public function withSurveyQuestion(string $surveyQuestion): self
    {
        $self = clone $this;
        $self['surveyQuestion'] = $surveyQuestion;

        return $self;
    }

    /**
     * @param ValueComparisonShape $valueComparison
     */
    public function withValueComparison(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
    ): self {
        $self = clone $this;
        $self['valueComparison'] = $valueComparison;

        return $self;
    }

    public function withSurveyAnswerColID(string $surveyAnswerColID): self
    {
        $self = clone $this;
        $self['surveyAnswerColID'] = $surveyAnswerColID;

        return $self;
    }

    public function withSurveyAnswerRowID(string $surveyAnswerRowID): self
    {
        $self = clone $this;
        $self['surveyAnswerRowID'] = $surveyAnswerRowID;

        return $self;
    }
}
