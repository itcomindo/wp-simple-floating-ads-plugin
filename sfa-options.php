<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'sfa_register_fields');
function sfa_register_fields()
{
    Container::make('theme_options', 'SFA Options')
        ->add_fields([


            //create checkbox to enable/disable SFA
            Field::make('checkbox', 'status_sfa', 'Enable/Disable SFA')
                ->set_option_value('yes')
                ->set_help_text('Check this box to enable SFA')
                ->set_default_value(false),

            //=========================how to show the ads: auto or use shortcode=========================
            Field::make('radio', 'show_ads_sfa', 'Show Ads')
                ->set_classes('cbhorizontal')
                ->add_options([
                    'auto' => 'Auto',
                    'shortcode' => 'Shortcode'
                ])
                ->set_default_value('auto')
                ->set_help_text('Choose how to show the ads: auto or use shortcode'),


            //=========================ads type=========================

            Field::make('radio', 'ads_type_sfa', 'Ads Type')
                ->set_classes('cbhorizontal')
                ->add_options([
                    'single' => 'Single Ads',
                    'multiple' => 'Multiple'
                ])
                ->set_default_value('single')
                ->set_help_text('Choose ads type: single untuk satu iklan, multiple untuk banyak iklan yang akan ditampilkan secara bergantian'),

            //=========================radio to choose ads position: bottom left, bottom center, bottom right=========================
            Field::make('radio', 'ads_position_sfa', 'Ads Position')
                ->set_classes('cbhorizontal')
                ->add_options([
                    'bottom-left' => 'Bottom Left',
                    'bottom-center' => 'Bottom Center',
                    'bottom-right' => 'Bottom Right'
                ])
                ->set_default_value('bottom-left')
                ->set_help_text('Choose ads position: bottom left, bottom center, bottom right'),


            //=========================Seperator=========================
            Field::make('separator', 'sfaadscontentsep', 'The Ads')
                ->set_classes('cbSeparator'),


            /**
             *=========================
             *NAME: if multiple ads type choosen
             *=========================
             */
            Field::make('complex', 'multiple_ads_sfa', 'Multiple Ads')
                ->set_layout('tabbed-horizontal')
                ->set_conditional_logic([
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'multiple'
                    ]
                ])
                ->add_fields([

                    // plihan tipe ads untuk multiple ads
                    Field::make('radio', 'ads_type_sfa_multiple', 'Ads Type xxx')
                        ->set_classes('cbhorizontal')
                        ->add_options([
                            'text' => 'Text',
                            'image' => 'Image',
                            'adsense' => 'Adsense'
                        ])
                        ->set_default_value('text')
                        ->set_help_text('Choose ads type: text, image or adsense'),

                    //=========================head text ads=========================
                    Field::make('text', 'head_text_ads_sfa_multiple', 'Head xxx')
                        ->set_default_value('Jasa Pembuatan Website Freelance')
                        ->set_help_text('Input head text for your ads e.g: Jasa Pembuatan Website Freelance')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'text'
                            ]
                        ]),

                    //=========================content text ads=========================
                    Field::make('rich_text', 'content_text_ads_sfa_multiple', 'Content xxx')
                        ->set_default_value('Yuk buat website di Jasa Pembuatan Website Freelance BudiHaryono.com')
                        ->set_help_text('Input content text for your ads e.g: Yuk buat website di Jasa Pembuatan Website BudiHaryono.com')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'text'
                            ]
                        ]),

                    //=========================url text ads=========================
                    Field::make('text', 'url_text_ads_sfa_multiple', 'URL xxx')
                        ->set_default_value('https://budiharyono.com')
                        ->set_help_text('Input url for your ads e.g: https://budiharyono.com')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'text'
                            ]
                        ]),

                    //=========================button text ads=========================
                    Field::make('text', 'button_text_ads_sfa_multiple', 'Button Text xxx')
                        ->set_default_value('Buat Website')
                        ->set_help_text('Input button text for your ads e.g: Buat Website')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'text'
                            ]
                        ]),


                    //=========================Complex Field End Above this Line=========================

                    //=========================image ads=========================
                    Field::make('image', 'image_ads_sfa_multiple', 'Image xxx')
                        ->set_help_text('Upload image for your ads')
                        ->set_value_type('url')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'image'
                            ]
                        ]),

                    //=========================url image ads=========================
                    Field::make('text', 'url_image_ads_sfa_multiple', 'URL xxx')
                        ->set_default_value('https://budiharyono.com')
                        ->set_help_text('Input url for your ads e.g: https://budiharyono.com')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'image'
                            ]
                        ]),

                    //=========================alt image=========================
                    Field::make('text', 'alt_image_ads_sfa_multiple', 'Alt xxx')
                        ->set_default_value('Jasa Pembuatan Website Freelance')
                        ->set_help_text('Input alt for your ads e.g: Jasa Pembuatan Website Freelance')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'image'
                            ]
                        ]),


                    //=========================button image ads=========================
                    Field::make('text', 'button_image_ads_sfa_multiple', 'Button Text xxx')
                        ->set_default_value('Buat Website')
                        ->set_help_text('Input button text for your ads e.g: Buat Website')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'image'
                            ]
                        ]),


                    //=========================Complex Field End Above this Line=========================

                    //=========================adsense ads=========================

                    //=========================adsense client id=========================
                    Field::make('text', 'adsense_client_id_sfa_multiple', 'Adsense Client ID xxx')
                        ->set_default_value('ca-pub-xxxxxxxxxxxxxxxx')
                        ->set_help_text('Input adsense client id for your ads e.g: ca-pub-xxxxxxxxxxxxxxxx')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'adsense'
                            ]
                        ]),

                    //=========================adsense slot id=========================
                    Field::make('text', 'adsense_slot_id_sfa_multiple', 'Adsense Slot ID xxx')
                        ->set_default_value('xxxxxxxxxx')
                        ->set_help_text('Input adsense slot id for your ads e.g: xxxxxxxxxx')
                        ->set_conditional_logic([
                            [
                                'field' => 'ads_type_sfa_multiple',
                                'value' => 'adsense'
                            ]
                        ]),





                ]),

            //=========================END MULTIPLE ADS ABOVE THIS=========================

            /**
             *=========================
             *NAME: if single ads type choosen: create radio to choose ads: text, image or adsense
             *=========================
             */
            Field::make('radio', 'ads_type_single_sfa', 'Ads Type')
                ->set_classes('cbhorizontal')
                ->add_options([
                    'text' => 'Text',
                    'image' => 'Image',
                    'adsense' => 'Adsense'
                ])
                ->set_default_value('text')
                ->set_help_text('Choose ads type: text, image or adsense')
                ->set_conditional_logic([
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            /**
             *=========================
             *NAME: if text ads type choosen: create text field for head, rich_text field for content, text field to input url and text field to input button text
             *=========================
             */

            //=========================head text ads=========================

            Field::make('text', 'head_text_ads_sfa', 'Head')
                ->set_default_value('Jasa Pembuatan Website Freelance')
                ->set_help_text('Input head text for your ads e.g: Jasa Pembuatan Website Freelance')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'text'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),
            //=========================content text ads=========================

            Field::make('rich_text', 'content_text_ads_sfa', 'Content')
                ->set_default_value('Yuk buat website di Jasa Pembuatan Website Freelance BudiHaryono.com')
                ->set_help_text('Input content text for your ads e.g: Yuk buat website di Jasa Pembuatan Website BudiHaryono.com')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'text'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            //=========================url text ads=========================
            Field::make('text', 'url_text_ads_sfa', 'URL')
                ->set_default_value('https://budiharyono.com')
                ->set_help_text('Input URL for your ads e.g: https://budiharyono.com')
                ->set_conditional_logic([
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'text'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            //=========================button text ads=========================
            Field::make('text', 'button_text_ads_sfa', 'Button Text')
                ->set_default_value('Klik Disini')
                ->set_help_text('Input button text for your ads e.g: Klik Disini')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'text'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            /**
             *=========================
             *NAME: if image ads type choosen: create image field to upload image, text field to input url and text field to input button text
             *=========================
             */

            //=========================image ads=========================
            Field::make('image', 'image_ads_sfa', 'Upload Image')
                ->set_value_type('url')
                ->set_help_text('Upload image for your ads: 300px x 250px')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'image'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            //=========================url image ads=========================
            Field::make('text', 'url_image_ads_sfa', 'URL')
                ->set_default_value('https://budiharyono.com')
                ->set_help_text('Input URL for your ads e.g: https://budiharyono.com')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'image'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            //=========================button text image ads=========================
            Field::make('text', 'button_text_image_ads_sfa', 'Button Text')
                ->set_default_value('Klik Disini')
                ->set_help_text('Input button text for your ads e.g: Klik Disini')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'image'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            //=========================alt and title for image=========================
            Field::make('text', 'alt_image_ads_sfa', 'Alt Image')
                ->set_default_value('Jasa Pembuatan Website Freelance')
                ->set_help_text('Input alt image for your ads e.g: Jasa Pembuatan Website Freelance')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'image'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            /**
             *=========================
             *NAME: if adsense ads type choosen: create text field to input adsense slot id
             *=========================
             */

            //=========================adsense Client ID=========================
            Field::make('text', 'adsense_client_id_sfa', 'Client ID')
                ->set_default_value('ca-pub-7273106919951725')
                ->set_help_text('Input adsense slot id for your ads e.g: ca-pub-xxxxxxxxxxxxxxxx pastikan sudah di approve oleh google adsense <span style="color:red;">dan ukuran iklan width 300px x height 250px</span><span style="color:darkred; font-weight:bold;"> Dan pastikan Anda sudah menambahkan adsense kode kedalam tag "head" theme Anda!!!.</span>')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'adsense'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),

            //=========================Adsense data-ad-slot=========================
            Field::make('text', 'adsense_data_ad_slot_sfa', 'Data Ad Slot')
                ->set_default_value('6402934236')
                ->set_help_text('Input adsense data ad slot for your ads e.g: 6402934236')
                ->set_conditional_logic([
                    'relation' => 'AND',
                    [
                        'field' => 'ads_type_single_sfa',
                        'value' => 'adsense'
                    ],
                    [
                        'field' => 'ads_type_sfa',
                        'value' => 'single'
                    ]
                ]),



































        ]);
}
