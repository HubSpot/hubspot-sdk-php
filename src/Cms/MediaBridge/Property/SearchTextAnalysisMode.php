<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Property;

enum SearchTextAnalysisMode: string
{
    case NONE = 'NONE';

    case NOT_ANALYZED_TEXT = 'NOT_ANALYZED_TEXT';
}
