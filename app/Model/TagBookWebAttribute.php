<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TagBookWebAttribute extends Model
{
    protected $fillable = [
        'priority',
        'reference_link_page',
        'description',
        'data_layer_data_attribute',
        'status_implementation_data_layer_data_attribute',
        'status_implementation_tag_manager',
        'status_google_analytics',
        'track_type',
        'tag_name',
        'fields_to_set',
        'event_category',
        'event_action',
        'event_label_var',
        'event_value',
        'custom_dimension_metrics',
        'additional',
        'comments',
        'tag_book_id',
    ];

    public $implementationStatus = [
        'done' => 'DONE',
        'to_do' => 'TO DO',
        'validate' => 'VALIDATE',
        'adjust' => 'ADJUST',
        'revalidate' => 'REVALIDATE',
        'not_apply' => 'NOT APPLY',
    ];

    public $trackType = [
        '-' => '-',
        'custom_html' => 'Custom HTML',
        'event' => 'Event',
        'exception' => 'Exception',
        'pageview' => 'Pageview',
        'social' => 'Social',
        'timing' => 'Timing',
        'transaction' => 'Transaction',
    ];

    public $exportHeadings = [
        'Priority',
        'Reference Link Page',
        'Description',
        'dataLayer ou data-attributes',
        'Status Implementation TagManager',
        'Status Implementation Analytics',
        'Status Google Analytics',
        'Track Type',
        'Tag Name',
        'Fields to Set',
        'Event Category',
        'Event Action',
        'Event Label/Var',
        'Event Value',
        'Custom Dimensions & Metrics',
        'Additional',
        'Comments',
    ];

    public function tagBook()
    {
        return $this->belongsTo('App\Model\TagBook');
    }
}
