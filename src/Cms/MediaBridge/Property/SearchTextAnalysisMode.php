<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

enum SearchTextAnalysisMode: string
{
    case NONE = 'NONE';

    case NOT_ANALYZED_TEXT = 'NOT_ANALYZED_TEXT';
}
