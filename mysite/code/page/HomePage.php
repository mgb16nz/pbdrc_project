<?php
/**
 * Pegasus Bay Drag Racing Club v1.0.0 (http://www.pbdrc.com)
 * Copyright 2017 Pegasus Bay Drag Racing
 * Customized HomePage.php
 * Created by SNAP Web Designs (http://www.snapwebdesigns.co.nz)
 */

class HomePage extends Page
{

    private static $db = array(
        'NoticeMessage' => 'HTMLText',
        'PosterAlt' => 'Text',
        'TitleHeader' => 'Text'
    );

    private static $has_one = array(
        'PosterImage' => 'Image'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        /*
        *   Main Content section
        */

        // Notification Message
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('NoticeMessage','Notification Message')->setRows(5),'Content');

        // Title Header
        $fields->addFieldToTab('Root.Main', TextField::create('TitleHeader','Content Header'),'Content');

        /*
        *   Poster Image section
        */

        // Poster Image Alt Text
        $fields->addFieldToTab('Root.Main', TextField::create('PosterAlt', 'Poster Alt Text'), 'TitleHeader');

        // Poster Images
        $fields->addFieldToTab('Root.Main', $uploader = UploadField::create('PosterImage', 'Choose a Poster Image to Upload'), 'TitleHeader');

        //Poster Image Uploader
        $uploader->setFolderName('Uploads/Poster');
        $uploader->getValidator()->setAllowedExtensions(array(
            'png','gif','jpg','jpeg'
        ));

        return $fields;
    }

}