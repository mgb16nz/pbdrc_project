<?php
/**
 * Pegasus Bay Drag Racing Club v1.0.0 (http://www.pbdrc.com)
 * Copyright 2017 Pegasus Bay Drag Racing
 * Customized RacerInfo.php
 * Created by SNAP Web Designs (http://www.snapwebdesigns.co.nz)
 */
class RacerInfo extends DataObject
{
    private static $db = array(
        'Title' => 'Text',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int'
    );

    private static $has_one = array(
        'Parent' => 'RacerPage'
    );

    private static $summary_fields = array(
        'ID' => 'ID',
        'Title' => 'Header',
        'Content.Summary' => 'Content',
        'SortOrder' => 'Order Sorted',
        'Created' => 'Date Created',
        'LastEdited' => 'Last Updated',

    );

    public static $default_sort='SortOrder';


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', TextField::create('Title', 'Header'));
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content', 'Content'));

        $fields->removeByName('SortOrder');
        $fields->removeByName('ParentID');

        return $fields;
    }
}